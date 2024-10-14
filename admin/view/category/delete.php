<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header1.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/category.php');

$category = new category();

if (isset($_GET['cate_id'])) {
    $cate_id = $_GET['cate_id'];

    // Gọi phương thức delete
    if ($category->delete($cate_id)) {
        echo "<script>alert('Xóa thể loại thành công!');</script>";
    } else {
        echo "<script>alert('Lỗi: Không thể xóa thể loại.');</script>";
    }
}

// Chuyển hướng trở lại trang danh sách thể loại
echo "<script>window.location = '/Project_Test_10624/admin/index.php';</script>";
exit;
?>
