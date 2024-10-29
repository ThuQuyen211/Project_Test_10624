<?php
require_once(__DIR__ . '/../lib/database.php');
require_once(__DIR__ . '/../helper/format.php');
class author
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect(); // Đảm bảo kết nối được thực hiện
        $this->fm = new Format();
    }

    public function show(){
        $sql = "SELECT * FROM author";
        $result = $this->db->select($sql); // Sửa query từ $query thành $sql
        return $result;
    }

    public function add($au_id, $au_name, $date, $note, $image_name){
        $au_id = $this->fm->validation($au_id);
        $au_id = mysqli_real_escape_string($this->db->conn, $au_id);

        $au_name = $this->fm->validation($au_name);
        $au_name = mysqli_real_escape_string($this->db->conn, $au_name);

        $date = $this->fm->validation($date);
        $date = mysqli_real_escape_string($this->db->conn, $date);

        $note = $this->fm->validation($note);
        $note = mysqli_real_escape_string($this->db->conn, $note);

        // Thêm tên file ảnh đã được truyền dưới dạng chuỗi
        $image_name = mysqli_real_escape_string($this->db->conn, $image_name);

    // Kiểm tra xem các trường có trống không
    if(empty($au_name) || empty($date) || empty($note) || empty($image_name)){
        return " Name, date, note, and image must not be empty!";
    } else {
        $sql = "INSERT INTO author(au_id, au_name, date, note, image) 
                VALUES('$au_id', '$au_name', '$date', '$note', '$image_name')";

        $inserted = $this->db->insert($sql); // Kiểm tra kết quả trả về từ hàm insert()

        if($inserted){
            return "Thêm mới tác giả thành công!";
        } else {
            return "Thêm mới tác giả thất bại!";
        }
    }
}
public function delete($au_id) {
    // Sanitize the input to prevent SQL injection
    $au_id = $this->fm->validation($au_id);
    $au_id = mysqli_real_escape_string($this->db->conn, $au_id);

    // Prepare the SQL delete statement
    $sql = "DELETE FROM author WHERE au_id = '$au_id'";
    
    // Execute the delete query and return the result
    $result = $this->db->delete($sql);
    
    // Check if the delete was successful
    if ($result) {
        return true; // Return true if delete was successful
    } else {
        return false; // Return false if delete failed
    }
}
public function edit($au_id, $au_name, $date, $note, $image_name) {
    // Validate and sanitize inputs
    $au_id = $this->fm->validation($au_id);
    $au_id = mysqli_real_escape_string($this->db->conn, $au_id);

    $au_name = $this->fm->validation($au_name);
    $au_name = mysqli_real_escape_string($this->db->conn, $au_name);

    $date = $this->fm->validation($date);
    $date = mysqli_real_escape_string($this->db->conn, $date);

    $note = $this->fm->validation($note);
    $note = mysqli_real_escape_string($this->db->conn, $note);

    // Sanitize image name
    $image_name = mysqli_real_escape_string($this->db->conn, $image_name);

    // Check for empty fields
    if(empty($au_name) || empty($date) || empty($note) || empty($image_name)) {
        return "Name, date, note, and image must not be empty!";
    } else {
        // Construct the SQL query to update the author's information
        $sql = "UPDATE author 
                SET au_name = '$au_name', date = '$date', note = '$note', image = '$image_name'
                WHERE au_id = '$au_id'";

        // Execute the update query
        $updated = $this->db->update($sql);

        // Check if the update was successful
        if($updated) {
            return "Update successful!";
        } else {
            return "Update failed!";
        }
    }
}
public function get_id($au_id) {
    // Validate and sanitize the author ID
    $au_id = $this->fm->validation($au_id);
    $au_id = mysqli_real_escape_string($this->db->conn, $au_id);

    // Construct the SQL query to select the author by ID
    $sql = "SELECT * FROM author WHERE au_id = '$au_id'";

    // Execute the query and get the result
    $result = $this->db->select($sql);

    // Check if the result is not empty and return the data
    if($result) {
        return $result; // This will return the author record as an associative array or object
    } else {
        return false; // If no author is found with that ID, return false or a suitable message
    }
}

public function uploadImage($file, $target_dir = "/Project_Test_10624/admin/public/images/", $maxFileSize = 5000000, $allowedExtensions = ["jpg", "png", "jpeg", "gif"]) {
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . $target_dir;
    $file_name = basename($file["name"]);
    $target_file = $target_dir . $file_name;
    $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check for upload errors
    if ($file["error"] !== UPLOAD_ERR_OK) {
        return "Lỗi khi tải lên: " . $file["error"]; // This returns a specific error code
    }

    // Validate image
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return "File không phải là hình ảnh.";
    }

    // Check file size
    if ($file["size"] > $maxFileSize) {
        return "File quá lớn. Kích thước tối đa cho phép là " . $maxFileSize / 1000000 . "MB.";
    }

    // Validate file extension
    if (!in_array($fileExtension, $allowedExtensions)) {
        return "Chỉ chấp nhận các định dạng JPG, JPEG, PNG, GIF.";
    }

    // Move the uploaded file
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $file_name;  // Return the file name if successful
    } else {
        return "Có lỗi xảy ra khi tải lên.";
    }
}
public function search($keyword = '') {
    // Bảo vệ dữ liệu đầu vào
    $keyword = $this->fm->validation($keyword);
    $keyword = mysqli_real_escape_string($this->db->conn, $keyword);

    // Câu truy vấn tìm kiếm với từ khóa
    if (!empty($keyword)) {
        $query = "SELECT * FROM author WHERE au_name LIKE '%$keyword%'";
    } else {
        // Nếu không có từ khóa, hiển thị tất cả bài đăng
        $query = "SELECT * FROM author";
    }

    // Thực thi câu truy vấn và trả về kết quả
    return $this->db->select($query);
}
public function getBookbyAuthorid($au_id) {
    // Xác thực và bảo vệ giá trị au_id
    $au_id = $this->fm->validation($au_id);
    $au_id = mysqli_real_escape_string($this->db->conn, $au_id);

    // Xây dựng câu truy vấn
    $sql = "SELECT s.book_id, s.book_name, tg.au_id, tg.au_name, tl.cate_id, tl.cate_name, nxb.pub_id, nxb.pub_name, s.page, s.status, s.image, s.summary 
            FROM book s
            JOIN author tg ON s.au_id = tg.au_id
            JOIN category tl ON s.cate_id = tl.cate_id
            JOIN publisher nxb ON s.pub_id = nxb.pub_id 
            WHERE tg.au_id = '$au_id'";

    // Thực hiện truy vấn
    $result = $this->db->select($sql);

    return $result; 
}

}
?>
