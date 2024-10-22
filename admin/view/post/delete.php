<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header1.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/post.php');

$post = new post();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gọi phương thức delete
    if ($post->delete($id)) {
        echo "<script>alert('Xóa bài đăng thành công!');</script>";
    } else {
        echo "<script>alert('Lỗi: Không thể xóa bài đăng.');</script>";
    }
}

// Chuyển hướng trở lại trang danh sách bài đăng
echo "<script>window.location = '/Project_Test_10624/admin/index.php';</script>";
exit;
?>
