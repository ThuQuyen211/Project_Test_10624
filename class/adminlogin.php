<?php
require ('../lib/session.php');
SESSION::checkLogin();
require ('../lib/database.php');
require ('../helper/format.php');

class adminlogin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect(); // Đảm bảo kết nối được thực hiện
        $this->fm = new Format();
    }

    public function login_admin($username, $password)
    {
        $username = $this->fm->validation($username);
        $password = $this->fm->validation($password);

        // Kiểm tra kết nối cơ sở dữ liệu
        if ($this->db->conn === null) {
            return "Không thể kết nối đến cơ sở dữ liệu.";
            echo '<script>setTimeout(function(){ location.reload(); }, 3000);</script>'; // Làm mới trang sau 3 giây
                exit(); // Dừng thực hiện mã tiếp theo

        }

        $username = mysqli_real_escape_string($this->db->conn, $username);
        $password = mysqli_real_escape_string($this->db->conn, $password);

        if(empty($username) || empty($password))
        {
            return "Username and Password must not be empty!";
        } else {
            $sql = "SELECT * FROM account WHERE username='$username' AND password='$password' LIMIT 1";
            $result = $this->db->select($sql); // Sửa query từ $query thành $sql

            if($result != false)
            {
                $value = $result->fetch_assoc();
                Session::set("adminlogin", true);
                Session::set("id", $value['id']);
                Session::set("username", $value['username']);
                header("Location: ../admin/index.php");
            }
            else
            {
                return "User and Pass not match";
                
            }
        }
    }
}
?>
