<?php
require ('header.php');
?>
 <?php
  // Kiểm tra nếu có tham số 'action' được truyền vào URL
  if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Dựa trên giá trị của 'action', include file tương ứng
    switch ($action) {
      case 'danhsachdocgia':
        include 'view/reader/list.php';
        break;
      case 'themdocgia':
        include 'view/reader/add.php';
        break;
      case 'danhsachnhaxuatban':
        include 'view/publisher/list.php';
        break;
      case 'themnhaxuatban':
        include 'view/publisher/add.php';
        break;
      case 'danhsachsach':
        include 'view/book/list.php';
        break;
      case 'themsach':
        include 'view/book/add.php';
        break;
      case 'danhsachtacgia':
        include 'view/author/list.php';
        break;
      case 'themtacgia':
        include 'view/author/add.php';
        break;
      case 'danhsachtheloai':
        include 'view/category/list.php';
        break;
      case 'themtheloai':
        include 'view/category/add.php';
        break;
      case 'danhsachtaikhoan':
        include 'view/account/list.php';
        break;
      case 'quanlybaocao':
        include 'view/dashboard/list.php';
        break;
      case 'lienhe':
        include 'view/contact/list.php';
        break;
      case 'danhsachbaidang':
        include 'view/post/list.php';
        break;
      case 'thembaidang':
        include 'view/post/add.php';
        break;
      default:
        echo "Trang không tồn tại!";
        break;
    }
  } else {
    // Nếu không có 'action', hiển thị trang mặc định
    include 'view/dashboard/list.php'; // trang mặc định khi không có action
  }
?>

<?php
  require('footer.php');
?>