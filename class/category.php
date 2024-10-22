<?php
require_once(__DIR__ . '/../lib/database.php');
require_once(__DIR__ . '/../helper/format.php');
class category
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
        $sql = "SELECT * FROM category";
        $result = $this->db->select($sql); // Sửa query từ $query thành $sql
        return $result;
    }
    public function add($cate_id, $cate_name, $note){
        $cate_id = $this->fm->validation($cate_id);
        $cate_id = mysqli_real_escape_string($this->db->conn, $cate_id);

        $cate_name = $this->fm->validation($cate_name);
        $cate_name = mysqli_real_escape_string($this->db->conn, $cate_name);

        $note = $this->fm->validation($note);
        $note = mysqli_real_escape_string($this->db->conn, $note);

        // Kiểm tra xem các trường có trống không
        if(empty($cate_name) || empty($note)){
            return "Name, note must not be empty!";
        } else {
            $sql = "INSERT INTO category(cate_id, cate_name, note) 
                    VALUES('$cate_id', '$cate_name', '$note')";

            $inserted = $this->db->insert($sql); // Kiểm tra kết quả trả về từ hàm insert()

            if($inserted){
                return "Thêm mới thể loại thành công!";
            } else {
                return "Thêm mới thể loại thất bại!";
            }
        }
    }

    public function get_id($cate_id) {
        $cate_id = $this->fm->validation($cate_id);
        $cate_id = mysqli_real_escape_string($this->db->conn, $cate_id);
        $sql = "SELECT * FROM category WHERE cate_id = '$cate_id'";
        return $this->db->select($sql);
    }

    public function getBookbyCateid($cate_id) {
        $cate_id = $this->fm->validation($cate_id);
        $cate_id = mysqli_real_escape_string($this->db->conn, $cate_id);
        $sql = "SELECT s.book_id, s.book_name, tg.au_id, tg.au_name, tl.cate_id, tl.cate_name, nxb.pub_id, nxb.pub_name, s.page, s.status, s.image, s.summary 
                FROM book s
                JOIN author tg ON s.au_id = tg.au_id
                JOIN category tl ON s.cate_id = tl.cate_id
                JOIN publisher nxb ON s.pub_id = nxb.pub_id WHERE tl.cate_id = '$cate_id'";
        return $this->db->select($sql);
    }

    public function edit($cate_id, $cate_name, $note) {
        $cate_id = $this->fm->validation($cate_id);
        $cate_id = mysqli_real_escape_string($this->db->conn, $cate_id);

        $cate_name = $this->fm->validation($cate_name);
        $cate_name = mysqli_real_escape_string($this->db->conn, $cate_name);

        $note = $this->fm->validation($note);
        $note = mysqli_real_escape_string($this->db->conn, $note);


        if (empty($cate_name) || empty($note)) {
            return "Tên và ghi chú không được để trống!";
        } else {
            $sql = "UPDATE category SET cate_name = '$cate_name', note = '$note' WHERE cate_id = '$cate_id'";
            return $this->db->update($sql);
        }
    }

    public function delete($cate_id) {
        $cate_id = $this->fm->validation($cate_id);
        $cate_id = mysqli_real_escape_string($this->db->conn, $cate_id); // Change this line
    
        $query = "DELETE FROM category WHERE cate_id = '$cate_id'";
        return $this->db->delete($query); // Call a delete method instead
    }

    public function search($keyword = '') {
        // Nếu có từ khóa tìm kiếm, dùng LIKE để tìm các mục có tên khớp với từ khóa
        if (!empty($keyword)) {
            // Bảo vệ dữ liệu đầu vào
            $keyword = $this->fm->validation($keyword);
            $keyword = mysqli_real_escape_string($this->db->conn, $keyword);
    
            // Câu truy vấn tìm kiếm với từ khóa
            $query = "SELECT * FROM category WHERE cate_name LIKE '%$keyword%'";
        } else {
            // Nếu không có từ khóa, hiển thị tất cả các danh mục
            $query = "SELECT * FROM category";
        }
    
        // Thực thi câu truy vấn và trả về kết quả
        return $this->db->select($query);
    }
    
}
?>
