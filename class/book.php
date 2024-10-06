<?php
require ('../lib/database.php');
require ('../helper/format.php');
class book
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
        $sql = "SELECT s.masach, s.tensach, tg.matacgia, tg.tentacgia, tl.matheloai, tl.tentheloai, nxb.manhaxuatban, nxb.tennhaxuatban, s.sotrang, s.trangthai, s.hinhanh, s.gioithieu FROM sach s, tacgia tg, theloai tl, nhaxuatban nxb
        WHERE s.matacgia = tg.matacgia AND s.matheloai = tl.matheloai AND s.manhaxuatban = nxb.manhaxuatban";
        $result = $this->db->select($sql); // Sửa query từ $query thành $sql
        return $result;
    }
    
}
?>
