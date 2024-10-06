<?php
require ('../lib/database.php');
require ('../helper/format.php');
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
    
}
?>
