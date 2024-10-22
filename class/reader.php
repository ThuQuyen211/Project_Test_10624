<?php
require_once(__DIR__ . '/../lib/database.php');
require_once(__DIR__ . '/../helper/format.php');

class reader
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect(); // Đảm bảo kết nối được thực hiện
        $this->fm = new Format();
    }

    // Hiển thị danh sách độc giả
    public function show()
    {
        $sql = "SELECT * FROM reader";
        $result = $this->db->select($sql);
        return $result;
    }

    // Thêm mới độc giả
    public function add($read_id, $read_name, $address, $phone, $mail)
    {
        $read_id = $this->fm->validation($read_id);
        $read_id = mysqli_real_escape_string($this->db->conn, $read_id);

        $read_name = $this->fm->validation($read_name);
        $read_name = mysqli_real_escape_string($this->db->conn, $read_name);

        $address = $this->fm->validation($address);
        $address = mysqli_real_escape_string($this->db->conn, $address);

        $phone = $this->fm->validation($phone);
        $phone = mysqli_real_escape_string($this->db->conn, $phone);

        $mail = $this->fm->validation($mail);
        $mail = mysqli_real_escape_string($this->db->conn, $mail);

        // Kiểm tra xem các trường có trống không
        if (empty($read_name) || empty($address) || empty($phone) || empty($mail)) {
            return "Name, Address, Phone, and Email must not be empty!";
        } else {
            $sql = "INSERT INTO reader(read_id, read_name, address, phone, mail) 
                    VALUES('$read_id', '$read_name', '$address', '$phone', '$mail')";

            $inserted = $this->db->insert($sql); // Kiểm tra kết quả trả về từ hàm insert()

            if ($inserted) {
                return "Thêm mới độc giả thành công!";
            } else {
                return "Thêm mới độc giả thất bại!";
            }
        }
    }

    // Lấy thông tin độc giả theo ID
    public function get_id($read_id)
    {
        $read_id = $this->fm->validation($read_id);
        $read_id = mysqli_real_escape_string($this->db->conn, $read_id);

        $sql = "SELECT * FROM reader WHERE read_id = '$read_id'";
        $result = $this->db->select($sql);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    // Sửa thông tin độc giả
    public function edit($read_id, $read_name, $address, $phone, $mail)
    {
        $read_id = $this->fm->validation($read_id);
        $read_id = mysqli_real_escape_string($this->db->conn, $read_id);

        $read_name = $this->fm->validation($read_name);
        $read_name = mysqli_real_escape_string($this->db->conn, $read_name);

        $address = $this->fm->validation($address);
        $address = mysqli_real_escape_string($this->db->conn, $address);

        $phone = $this->fm->validation($phone);
        $phone = mysqli_real_escape_string($this->db->conn, $phone);

        $mail = $this->fm->validation($mail);
        $mail = mysqli_real_escape_string($this->db->conn, $mail);

        // Kiểm tra xem các trường có trống không
        if (empty($read_name) || empty($address) || empty($phone) || empty($mail)) {
            return "Name, Address, Phone, and Email must not be empty!";
        } else {
            $sql = "UPDATE reader 
                    SET read_name = '$read_name', address = '$address', phone = '$phone', mail = '$mail' 
                    WHERE read_id = '$read_id'";

            $updated = $this->db->update($sql); // Phương thức update thay cho edit()

            if ($updated) {
                return "Thay đổi độc giả thành công!";
            } else {
                return "Thay đổi độc giả thất bại!";
            }
        }
    }
    public function delete($read_id) {
        $read_id = $this->fm->validation($read_id); // Validate the ID
        $read_id = mysqli_real_escape_string($this->db->conn, $read_id); // Sanitize the ID
    
        $query = "DELETE FROM reader WHERE read_id = '$read_id'"; // Adjust table name if necessary
        return $this->db->delete($query); // Call the delete method from the database class
    }

    public function search($keyword = '') {
        // Bảo vệ dữ liệu đầu vào
        $keyword = $this->fm->validation($keyword);
        $keyword = mysqli_real_escape_string($this->db->conn, $keyword);
    
        // Câu truy vấn tìm kiếm với từ khóa
        if (!empty($keyword)) {
            $query = "SELECT * FROM reader WHERE read_name LIKE '%$keyword%'";
        } else {
            // Nếu không có từ khóa, hiển thị tất cả bài đăng
            $query = "SELECT * FROM reader";
        }
    
        // Thực thi câu truy vấn và trả về kết quả
        return $this->db->select($query);
    }    
    
}
?>
