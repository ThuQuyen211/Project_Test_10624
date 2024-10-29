<?php
class Database {
    public $conn;

    // Hàm khởi tạo - tự động gọi hàm kết nối tới CSDL
    public function __construct() {
        $this->connect(); // Gọi hàm connect khi tạo đối tượng
    }

    // Hàm kết nối tới CSDL
    public function connect() {
        $servername = "localhost";  // Tên máy chủ MySQL
        $username = "admin";         // Tên người dùng MySQL
        $password = "Anhemnhom8";    // Mật khẩu MySQL
        $dbname = "library";         // Tên cơ sở dữ liệu

        // Kết nối tới MySQL
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }

    // Hàm ngắt kết nối CSDL
    public function disconnect() {
        $this->conn->close();
        echo "Ngắt kết nối thành công";
    }

    // Select or Read data
    public function select($query) {
        $result = $this->conn->query($query) or die($this->conn->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    // Insert data
    public function insert($query) {
        $insert_row = $this->conn->query($query) or die($this->conn->error . __LINE__);
        return $insert_row ? $insert_row : false;
    }

    // Update data
    public function update($query) {
        $update_row = $this->conn->query($query) or die($this->conn->error . __LINE__);
        return $update_row ? $update_row : false;
    }

    // Delete data
    public function delete($query) {
        $delete_row = $this->conn->query($query) or die($this->conn->error . __LINE__);
        return $delete_row ? $delete_row : false;
    }
}

?>
