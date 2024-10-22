<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header1.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/publisher.php');

$publisher = new publisher();

if (isset($_GET['pub_id'])) {
    $pub_id = $_GET['pub_id'];

    // Gọi phương thức delete
    if ($publisher->delete($pub_id)) {
        echo "<script>alert('Xóa nhà xuất bản thành công!');</script>";
    } else {
        echo "<script>alert('Lỗi: Không thể xóa nhà xuất bản.');</script>";
    }
}

// Chuyển hướng trở lại trang danh sách nhà xuất bản
echo "<script>window.location = '/Project_Test_10624/admin/index.php';</script>";
exit;
?>
