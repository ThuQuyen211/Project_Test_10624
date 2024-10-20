<?php
require_once(__DIR__ . '/lib/session.php');
require_once(__DIR__ . '/lib/database.php');
require_once(__DIR__ . '/helper/format.php');

class login
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect(); // Đảm bảo kết nối được thực hiện
        $this->fm = new Format();
    }

    public function login($username, $password)
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

            $sql = "SELECT * FROM reader WHERE username='$username' AND password='" . md5($password) . "' LIMIT 1";
            $result = $this->db->select($sql);

            if($result != false)
            {
                $value = $result->fetch_assoc();
                Session::set("login", true);
                Session::set("read_id", $value['read_id']);
                Session::set("username", $value['username']);
                header("Location: index.php");
            }
            else
            {
                return "Tên đăng nhập/ Mật khẩu không đúng!";
                
            }
        
    }
}
?>
