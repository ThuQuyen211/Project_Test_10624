<?php
require ('../lib/database.php');
require ('../helper/format.php');
class genre
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
        $sql = "SELECT * FROM theloai";
        $result = $this->db->select($sql); // Sửa query từ $query thành $sql
        return $result;
    }
    
}
?>
