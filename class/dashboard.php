<?php
require_once(__DIR__ . '/../lib/database.php');
require_once(__DIR__ . '/../helper/format.php');
class dashboard {
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect(); // Đảm bảo kết nối được thực hiện
        $this->fm = new Format();
    }

    public function getAllBooks() {
        return $this->db->select("SELECT * FROM book");
    }

    public function getAllReaders() {
        return $this->db->select("SELECT * FROM reader");
    }

    public function getAllGenres() {
        return $this->db->select("SELECT * FROM category");
    }

    public function getOutOfStockBooks() {
        return $this->db->select("SELECT * FROM book WHERE status = 'Hết'");
    }
    
    public function getGenreStatistics() {
        return $this->db->select("
            SELECT category.*, COUNT(book.cate_id) AS so_vl 
            FROM book 
            INNER JOIN category ON book.cate_id = category.cate_id 
            GROUP BY book.cate_id
        ");
    }

    public function getAllBooksDetails() {
        return $this->db->select("
            SELECT s.book_id, s.book_name, tg.au_id, tg.au_name, tl.cate_id, tl.cate_name, 
                   nxb.pub_id, nxb.pub_name, s.page, s.status, s.image, s.summary 
            FROM book s 
            JOIN author tg ON s.au_id = tg.au_id 
            JOIN category tl ON s.cate_id = tl.cate_id 
            JOIN publisher nxb ON s.pub_id = nxb.pub_id
        ");
    }

    public function getOutOfStockBooksDetails() {
        return $this->db->select("
            SELECT s.book_id, s.book_name, tg.au_id, tg.au_name, tl.cate_id, tl.cate_name, 
                   nxb.pub_id, nxb.pub_name, s.page, s.status, s.image, s.summary 
            FROM book s 
            JOIN author tg ON s.au_id = tg.au_id 
            JOIN category tl ON s.cate_id = tl.cate_id 
            JOIN publisher nxb ON s.pub_id = nxb.pub_id 
            WHERE s.status = 'Hết'
        ");
    }
}
?>
