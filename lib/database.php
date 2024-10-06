<?php
class Database {
		public $conn;
	
		// Hàm kết nối tới CSDL
		public function connect() {
			$servername = "localhost";  // Tên máy chủ MySQL
			$username = "Thu_Quyen";         // Tên người dùng MySQL
			$password = "Anhemnhom8";             // Mật khẩu MySQL (để trống nếu không có)
			$dbname = "thu_quyen";  // Tên cơ sở dữ liệu
	
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
    public function select($query)
    {
        $result = $this->conn->query($query) or die($this->conn->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    // Insert data
    public function insert($query)
    {
        $insert_row = $this->conn->query($query) or die($this->conn->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }

    // Update data
    public function update($query)
    {
        $update_row = $this->conn->query($query) or die($this->conn->error . __LINE__);
        if ($update_row) {
            return $update_row;
        } else {
            return false;
        }
    }

    // Delete data
    public function delete($query)
    {
        $delete_row = $this->conn->query($query) or die($this->conn->error . __LINE__);
        if ($delete_row) {
            return $delete_row;
        } else {
            return false;
        }
    }
}
?>
