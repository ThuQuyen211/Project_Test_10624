<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header1.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/reader.php');

$reader = new reader();

if (isset($_GET['read_id'])) {
    $read_id = $_GET['read_id'];

    // Gọi phương thức delete
    if ($reader->delete($read_id)) {
        echo "<script>alert('Xóa người đọc thành công!');</script>";
    } else {
        echo "<script>alert('Lỗi: Không thể xóa người đọc.');</script>";
    }
}

// Chuyển hướng trở lại trang danh sách người đọc
echo "<script>window.location = '/Project_Test_10624/admin/index.php';</script>";
exit;
?>
