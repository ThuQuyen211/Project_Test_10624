<?php
require_once(__DIR__ . '/../lib/database.php');
require_once(__DIR__ . '/../helper/format.php');
class post
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
        $sql = "SELECT * FROM post";
        $result = $this->db->select($sql); // Sửa query từ $query thành $sql
        return $result;
    }
    public function add($id, $title, $content, $author){
        $id = $this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->conn, $id);
    
        $title = $this->fm->validation($title);
        $title = mysqli_real_escape_string($this->db->conn, $title);
    
        $content = $this->fm->validation($content);
        $content = mysqli_real_escape_string($this->db->conn, $content);
    
        $author = $this->fm->validation($author);
        $author = mysqli_real_escape_string($this->db->conn, $author);
    
        // Kiểm tra xem các trường có trống không
        if(empty($title) || empty($author) || empty($content)){
            return "Title, Author, Content must not be empty!";
        } else {
            // Correcting the SQL statement
            $sql = "INSERT INTO post(title, content, author) 
                    VALUES('$title', '$content', '$author')"; // Corrected placement of quotes
    
            $inserted = $this->db->insert($sql); // Check the result from the insert() function
    
            if($inserted){
                return "Thêm mới bài đăng thành công!";
            } else {
                return "Thêm mới bài đăng thất bại!";
            }
        }
    }

    public function edit($id, $title, $content, $author) {
        // Kiểm tra và xử lý dữ liệu đầu vào
        $id = $this->fm->validation($id);
        $title = $this->fm->validation($title);
        $content = $this->fm->validation($content);
        $author = $this->fm->validation($author);

        // Escape dữ liệu để tránh SQL Injection
        $id = mysqli_real_escape_string($this->db->conn, $id);
        $title = mysqli_real_escape_string($this->db->conn, $title);
        $content = mysqli_real_escape_string($this->db->conn, $content);
        $author = mysqli_real_escape_string($this->db->conn, $author);

        // Kiểm tra xem các trường có trống không
        if (empty($title) || empty($content) || empty($author)) {
            return "Không được để trống tiêu đề, nội dung hoặc tác giả.";
        } else {
            // Cập nhật thông tin bài đăng
            $sql = "UPDATE post 
                    SET title = '$title', content = '$content', author = '$author' 
                    WHERE id = '$id'";

            $updated = $this->db->update($sql); // Sử dụng phương thức update của đối tượng Database

            if ($updated) {
                return true; // Trả về true nếu cập nhật thành công
            } else {
                return false; // Trả về false nếu có lỗi xảy ra
            }
        }
    }

    // Hàm lấy thông tin bài đăng theo id (nếu cần)
    public function get_id($id) {
        $id = $this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->conn, $id);

        $sql = "SELECT * FROM post WHERE id = '$id'";
        return $this->db->select($sql);
    }

    public function delete($id) {
        // Kiểm tra và xử lý dữ liệu đầu vào
        $id = $this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->conn, $id);

        // Kiểm tra xem id có hợp lệ không
        if (empty($id)) {
            return "ID không hợp lệ.";
        } else {
            // Xóa bài đăng dựa trên id
            $sql = "DELETE FROM post WHERE id = '$id'";

            $deleted = $this->db->delete($sql); // Sử dụng phương thức delete của đối tượng Database

            if ($deleted) {
                return true; // Trả về true nếu xóa thành công
            } else {
                return false; // Trả về false nếu có lỗi xảy ra
            }
        }
    }

    public function search($keyword = '') {
        // Bảo vệ dữ liệu đầu vào
        $keyword = $this->fm->validation($keyword);
        $keyword = mysqli_real_escape_string($this->db->conn, $keyword);
    
        // Câu truy vấn tìm kiếm với từ khóa
        if (!empty($keyword)) {
            $query = "SELECT * FROM post WHERE title LIKE '%$keyword%'";
        } else {
            // Nếu không có từ khóa, hiển thị tất cả bài đăng
            $query = "SELECT * FROM post";
        }
    
        // Thực thi câu truy vấn và trả về kết quả
        return $this->db->select($query);
    }    
    
}
?>
