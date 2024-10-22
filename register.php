<?php
require_once(__DIR__ . '/lib/database.php');
require_once(__DIR__ . '/helper/format.php');

class register
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect(); // Đảm bảo kết nối được thực hiện
        $this->fm = new Format();
    }
    public function add($read_id, $read_name, $address, $phone, $mail, $username, $password)
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

        $username = $this->fm->validation($username);
        $username = mysqli_real_escape_string($this->db->conn, $username);

        $password = $this->fm->validation($password);
        $password = mysqli_real_escape_string($this->db->conn, md5($password));

        $sql = "INSERT INTO reader(read_id, read_name, address, phone, mail, username, password) 
        VALUES('$read_id', '$read_name', '$address', '$phone', '$mail', '$username', '$password')";

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
