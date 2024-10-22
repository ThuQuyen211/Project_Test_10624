<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/book.php'); ?>
<?php
$book = new book();

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id']; // Lấy ID sách từ URL

    // Gọi phương thức delete trong Model để xóa tác giả
    $deleteResult = $book->delete($book_id);

    // Kiểm tra kết quả và hiển thị thông báo
    if ($deleteResult) {
        echo "sách đã được xóa thành công!";
        header("Location: \Project_Test_10624\admin\index.php"); // Chuyển đến trang danh sách sách
    } else {
        echo "Có lỗi xảy ra khi xóa.";
    }
} else {
    echo "ID sách không hợp lệ.";
}
?>