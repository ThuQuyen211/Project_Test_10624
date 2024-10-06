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
        include 'list/danhsachdocgia.php';
        break;
      case 'danhsachnhaxuatban':
        include 'list/danhsachnhaxuatban.php';
        break;
      case 'danhsachsach':
        include 'list/danhsachsach.php';
        break;
      case 'danhsachtacgia':
        include 'list/danhsachtacgia.php';
        break;
      case 'danhsachtheloai':
        include 'list/danhsachtheloai.php';
        break;
      case 'danhsachtaikhoan':
        include 'list/danhsachtaikhoan.php';
        break;
      case 'quanlybaocao':
        include 'list/quanlybaocao.php';
        break;
      case 'lienhe':
        include 'list/lienhe.php';
        break;
      case 'danhsachbaidang':
        include 'list/danhsachbaidang.php';
        break;
      default:
        echo "Trang không tồn tại!";
        break;
    }
  } else {
    // Nếu không có 'action', hiển thị trang mặc định
    include 'dashboard.php'; // trang mặc định khi không có action
  }
?>

<?php
  include_once('footer.php');
  ?>