<?php
require_once(__DIR__ . '/lib/database.php');
require_once(__DIR__ . '/helper/format.php');

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

    public function get_id($read_id)
{
    $read_id = $this->fm->validation($read_id);
    $read_id = mysqli_real_escape_string($this->db->conn, $read_id);

    $sql = "SELECT * FROM reader WHERE read_id = '$read_id'";
    $result = $this->db->select($sql);

    if ($result) {
        // Kiểm tra xem kết quả có phải là mảng không
        return mysqli_fetch_assoc($result); // Sử dụng mysqli_fetch_assoc để lấy kết quả như mảng
    } else {
        return false;
    }
}

    public function edit($read_id, $read_name, $address, $phone, $mail, $username, $password)
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

        // Kiểm tra xem các trường có trống không
            $sql = "UPDATE reader 
                    SET read_name = '$read_name', address = '$address', phone = '$phone', mail = '$mail', username = '$username', password = '$password'
                    WHERE read_id = '$read_id'";

            $updated = $this->db->update($sql); // Phương thức update thay cho edit()

            if ($updated) {
                return "Thay đổi độc giả thành công!";
            } else {
                return "Thay đổi độc giả thất bại!";
            }
        }
}
?>
