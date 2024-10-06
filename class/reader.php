<?php
require('../../lib/database.php');
require('../../helper/format.php');

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
        $sql = "SELECT madocgia, tendocgia, diachi, sodienthoai, gmail FROM docgia";
        $result = $this->db->select($sql);
        return $result;
    }
}
?>