<?php
require_once(__DIR__ . '/../lib/database.php');
require_once(__DIR__ . '/../helper/format.php');

class book
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect(); // Ensure the connection is established
        $this->fm = new Format();
    }

    // Show all books with their related authors, categories, and publishers
    public function show() {
        $sql = "SELECT s.book_id, s.book_name, tg.au_id, tg.au_name, tl.cate_id, tl.cate_name, nxb.pub_id, nxb.pub_name, s.page, s.status, s.image, s.summary 
                FROM book s
                JOIN author tg ON s.au_id = tg.au_id
                JOIN category tl ON s.cate_id = tl.cate_id
                JOIN publisher nxb ON s.pub_id = nxb.pub_id";
        return $this->db->select($sql);
    }

    // Get a list of authors
    public function getAu() {
        $sql = "SELECT * FROM author";
        return $this->db->select($sql);
    }

    // Get a list of categories
    public function getCate() {
        $sql = "SELECT * FROM category";
        return $this->db->select($sql);
    }

    // Get a list of publishers
    public function getPublisher() {
        $sql = "SELECT * FROM publisher";
        return $this->db->select($sql);
    }

    // Add a new book to the database
    public function add($book_id, $book_name, $au_id, $cate_id, $pub_id, $page, $status, $image_name, $summary) {
        // Xác thực và bảo vệ thông tin đầu vào
        $book_id = $this->fm->validation($book_id);
        $book_id = mysqli_real_escape_string($this->db->conn, $book_id);
    
        $book_name = $this->fm->validation($book_name);
        $book_name = mysqli_real_escape_string($this->db->conn, $book_name);
    
        $au_id = $this->fm->validation($au_id);
        $au_id = mysqli_real_escape_string($this->db->conn, $au_id);
    
        $cate_id = $this->fm->validation($cate_id);
        $cate_id = mysqli_real_escape_string($this->db->conn, $cate_id);
    
        $pub_id = $this->fm->validation($pub_id);
        $pub_id = mysqli_real_escape_string($this->db->conn, $pub_id);
    
        $page = $this->fm->validation($page);
        $page = mysqli_real_escape_string($this->db->conn, $page);
    
        $status = $this->fm->validation($status);
        $status = mysqli_real_escape_string($this->db->conn, $status);
    
        $image_name = mysqli_real_escape_string($this->db->conn, $image_name);
    
        $summary = $this->fm->validation($summary);
        $summary = mysqli_real_escape_string($this->db->conn, $summary);
    
        // Kiểm tra xem các trường có trống không
        if (empty($book_name) || empty($au_id) || empty($cate_id) || empty($pub_id) || empty($page) || empty($status) || empty($image_name) || empty($summary)) {
            return "Tên sách, tác giả, thể loại, nhà xuất bản, số trang, trạng thái, hình ảnh và tóm tắt không được để trống!";
        }
    
        // Thực hiện câu lệnh INSERT
        $sql = "INSERT INTO book (book_id, book_name, au_id, cate_id, pub_id, page, status, image, summary) 
                VALUES ('$book_id', '$book_name', '$au_id', '$cate_id', '$pub_id', '$page', '$status', '$image_name', '$summary')";
    
        return $this->db->insert($sql);
    }
    // Update an existing book in the database
    public function edit($book_id, $book_name, $au_id, $cate_id, $pub_id, $page, $status, $image_name, $summary) {
        // Xác thực và bảo vệ thông tin đầu vào
        $book_id = $this->fm->validation($book_id);
        $book_id = mysqli_real_escape_string($this->db->conn, $book_id);

        $book_name = $this->fm->validation($book_name);
        $book_name = mysqli_real_escape_string($this->db->conn, $book_name);

        $au_id = $this->fm->validation($au_id);
        $au_id = mysqli_real_escape_string($this->db->conn, $au_id);

        $cate_id = $this->fm->validation($cate_id);
        $cate_id = mysqli_real_escape_string($this->db->conn, $cate_id);

        $pub_id = $this->fm->validation($pub_id);
        $pub_id = mysqli_real_escape_string($this->db->conn, $pub_id);

        $page = $this->fm->validation($page);
        $page = mysqli_real_escape_string($this->db->conn, $page);

        $status = $this->fm->validation($status);
        $status = mysqli_real_escape_string($this->db->conn, $status);

        $image_name = mysqli_real_escape_string($this->db->conn, $image_name);

        $summary = $this->fm->validation($summary);
        $summary = mysqli_real_escape_string($this->db->conn, $summary);

        // Kiểm tra xem các trường có trống không
        if (empty($book_name) || empty($au_id) || empty($cate_id) || empty($pub_id) || empty($page) || empty($status) || empty($image_name) || empty($summary)) {
            return "Tên sách, tác giả, thể loại, nhà xuất bản, số trang, trạng thái, hình ảnh và tóm tắt không được để trống!";
        }

        // Thực hiện câu lệnh UPDATE
        $sql = "UPDATE book 
                SET book_name = '$book_name', au_id = '$au_id', cate_id = '$cate_id', pub_id = '$pub_id', 
                    page = '$page', status = '$status', image = '$image_name', summary = '$summary' 
                WHERE book_id = '$book_id'";

        return $this->db->update($sql);
    }

        
    // Delete a book from the database
    public function delete($book_id) {
        $sql = "DELETE FROM book WHERE book_id = '$book_id'";
        return $this->db->delete($sql);
    }

    // Handle image upload with various checks
    public function uploadImage($file, $target_dir = "/Project_Test_10624/admin/public/images/", $maxFileSize = 5000000, $allowedExtensions = ["jpg", "png", "jpeg", "gif"]) {
        // Xây dựng đường dẫn tuyệt đối
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . $target_dir;
    
        $file_name = basename($file["name"]);
        $target_file = $target_dir . $file_name;
        $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Kiểm tra file có phải là ảnh hợp lệ
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            return "File không phải là hình ảnh.";
        }
    
        // Kiểm tra kích thước file
        if ($file["size"] > $maxFileSize) {
            return "File quá lớn. Kích thước tối đa cho phép là " . $maxFileSize / 1000000 . "MB.";
        }
    
        // Kiểm tra định dạng file
        if (!in_array($fileExtension, $allowedExtensions)) {
            return "Chỉ chấp nhận các định dạng JPG, JPEG, PNG, GIF.";
        }
    
        // Kiểm tra lỗi tải lên
        if ($file["error"] !== UPLOAD_ERR_OK) {
            return "Lỗi khi tải lên: " . $file["error"]; // Return specific error code
        }
    
        // Di chuyển file vào thư mục đích
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $file_name;  // Trả về tên file nếu thành công
        } else {
            return "Có lỗi xảy ra khi tải lên.";
        }
    }

    // Get a book by its ID
    public function get_id($book_id) {
        $sql = "SELECT * FROM book WHERE book_id = '$book_id'";
        return $this->db->select($sql);
    }

    public function search($keyword = '') {
        // Nếu có từ khóa tìm kiếm, dùng LIKE để tìm các mục có tên khớp với từ khóa
        if (!empty($keyword)) {
            // Bảo vệ dữ liệu đầu vào
            $keyword = $this->fm->validation($keyword);
            $keyword = mysqli_real_escape_string($this->db->conn, $keyword);
    
            // Câu truy vấn tìm kiếm với từ khóa
            $query = "SELECT s.book_id, s.book_name, tg.au_id, tg.au_name, tl.cate_id, tl.cate_name, nxb.pub_id, nxb.pub_name, s.page, s.status, s.image, s.summary 
                FROM book s
                JOIN author tg ON s.au_id = tg.au_id
                JOIN category tl ON s.cate_id = tl.cate_id
                JOIN publisher nxb ON s.pub_id = nxb.pub_id WHERE s.book_name LIKE '%$keyword%'";
        } else {
            // Nếu không có từ khóa, hiển thị tất cả các danh mục
            $query = "SELECT s.book_id, s.book_name, tg.au_id, tg.au_name, tl.cate_id, tl.cate_name, nxb.pub_id, nxb.pub_name, s.page, s.status, s.image, s.summary 
                FROM book s
                JOIN author tg ON s.au_id = tg.au_id
                JOIN category tl ON s.cate_id = tl.cate_id
                JOIN publisher nxb ON s.pub_id = nxb.pub_id";
        }
    
        // Thực thi câu truy vấn và trả về kết quả
        return $this->db->select($query);
    }
}
?>
