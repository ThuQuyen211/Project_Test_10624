<?php
require_once(__DIR__ . '/../lib/database.php');
require_once(__DIR__ . '/../helper/format.php');

class publisher
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
        $sql = "SELECT * FROM publisher";
        $result = $this->db->select($sql); // Sửa query từ $query thành $sql
        return $result;
    }
    public function add($pub_id, $pub_name, $year){
        $pub_id = $this->fm->validation($pub_id);
        $pub_id = mysqli_real_escape_string($this->db->conn, $pub_id);

        $pub_name = $this->fm->validation($pub_name);
        $pub_name = mysqli_real_escape_string($this->db->conn, $pub_name);

        $year = $this->fm->validation($year);
        $year = mysqli_real_escape_string($this->db->conn, $year);

        // Kiểm tra xem các trường có trống không
        if(empty($pub_name) || empty($year)){
            return "Name, Year must not be empty!";
        } else {
            $sql = "INSERT INTO publisher(pub_id, pub_name, year) 
                    VALUES('$pub_id', '$pub_name', '$year')";

            $inserted = $this->db->insert($sql); // Kiểm tra kết quả trả về từ hàm insert()

            if($inserted){
                return "Thêm mới nhà xuất bản thành công!";
            } else {
                return "Thêm mới nhà xuất bản thất bại!";
            }
        }
    }
    public function get_id($pub_id)
    {
        $pub_id = $this->fm->validation($pub_id);
        $pub_id = mysqli_real_escape_string($this->db->conn, $pub_id);

        $sql = "SELECT * FROM publisher WHERE pub_id = '$pub_id'";
        $result = $this->db->select($sql);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    // Sửa thông tin nhà xuất bản
    public function edit($pub_id, $pub_name, $year)
    {
        $pub_id = $this->fm->validation($pub_id);
        $pub_id = mysqli_real_escape_string($this->db->conn, $pub_id);

        $pub_name = $this->fm->validation($pub_name);
        $pub_name = mysqli_real_escape_string($this->db->conn, $pub_name);

        $year = $this->fm->validation($year);
        $year = mysqli_real_escape_string($this->db->conn, $year);

        // Kiểm tra xem các trường có trống không
        if (empty($pub_name) || empty($year)) {
            return "Name, year must not be empty!";
        } else {
            $sql = "UPDATE publisher 
                    SET pub_name = '$pub_name', year = '$year'
                    WHERE pub_id = '$pub_id'";

            $updated = $this->db->update($sql); // Phương thức update thay cho edit()

            if ($updated) {
                return "Thay đổi nhà xuất bản thành công!";
            } else {
                return "Thay đổi nhà xuất bản thất bại!";
            }
        }
    }

    public function delete($pub_id) {
        $pub_id = $this->fm->validation($pub_id); // Validate the ID
        $pub_id = mysqli_real_escape_string($this->db->conn, $pub_id); // Sanitize the ID
    
        $query = "DELETE FROM publisher WHERE pub_id = '$pub_id'"; // Adjust the table name if necessary
        return $this->db->delete($query); // Call the delete method from the database class
    }

    public function search($keyword = '') {
        // Bảo vệ dữ liệu đầu vào
        $keyword = $this->fm->validation($keyword);
        $keyword = mysqli_real_escape_string($this->db->conn, $keyword);
    
        // Câu truy vấn tìm kiếm với từ khóa
        if (!empty($keyword)) {
            $query = "SELECT * FROM publisher WHERE pub_name LIKE '%$keyword%'";
        } else {
            // Nếu không có từ khóa, hiển thị tất cả bài đăng
            $query = "SELECT * FROM publisher";
        }
    
        // Thực thi câu truy vấn và trả về kết quả
        return $this->db->select($query);
    }    
    
}
?>
