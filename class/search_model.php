<?php
require_once('lib/database.php'); // Include your database class
require_once('helper/format.php'); // Include your format helper if necessary

class SearchModel {
    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database(); // Ensure this initializes the connection
        $this->fm = new Format();    // Assuming you have a Format class for sanitizing inputs
    }

    public function search($keyword='') {
        if (!empty($keyword)) {
            // Bảo vệ dữ liệu đầu vào
            $keyword = $this->fm->validation($keyword);
            $keyword = mysqli_real_escape_string($this->db->conn, $keyword);

        // Prepare the SQL query to search books and authors
        $query = "SELECT s.book_id, s.book_name, tg.au_id, tg.au_name, tl.cate_id, tl.cate_name, nxb.pub_id, nxb.pub_name, s.page, s.status, s.image, s.summary 
                  FROM book s
                  JOIN author tg ON s.au_id = tg.au_id
                  JOIN category tl ON s.cate_id = tl.cate_id
                  JOIN publisher nxb ON s.pub_id = nxb.pub_id
                  WHERE s.book_name LIKE '%$keyword%' OR tg.au_name LIKE '%$keyword%'";

        return $this->db->select($query); // Execute the query
    }
}
}
?>
