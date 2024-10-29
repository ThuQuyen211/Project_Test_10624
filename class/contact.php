<?php
require_once(__DIR__ . '/../lib/database.php');
require_once(__DIR__ . '/../helper/format.php');
class contact
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
        $sql = "SELECT * FROM contact";
        $result = $this->db->select($sql); // Sửa query từ $query thành $sql
        return $result;
    }
    
    public function add($name, $email, $message){
        $name = $this->fm->validation($name);
        $name = mysqli_real_escape_string($this->db->conn, $name);

        $email = $this->fm->validation($email);
        $email = mysqli_real_escape_string($this->db->conn, $email);

        $message = $this->fm->validation($message);
        $message = mysqli_real_escape_string($this->db->conn, $message);

        $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
        $inserted = $this->db->insert($sql);
        if ($inserted) {
            return true;
        } else {
            echo "Lỗi khi thêm dữ liệu: " . $this->db->conn->error;
            return false;
        }
    }
}
?>
