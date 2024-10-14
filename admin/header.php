<?php
  require_once ($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/lib/session.php');
  Session::checkSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="public/css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../admin/public/css/css_header.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
</head>

<body class="app sidebar-mini rtl">

  <!-- Navbar-->
  <header class="app-header">
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      <?php
      if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
      }
      ?>
      <li><a class="app-nav__item" href="?action=logout"><i class='bx bx-log-out bx-rotate-180'></i></a></li>
    </ul>
  </header>

  <!-- Sidebar menu -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
    </div>
    <hr>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="?action=quanlybaocao"><i class='app-menu__icon bx bx-bar-chart-square'></i><span class="app-menu__label">Thống kê</span></a></li>
        <li><a class="app-menu__item" href="?action=danhsachtaikhoan"><i class='app-menu__icon bx bx-id-card'></i><span class="app-menu__label">Quản lý tài khoản</span></a></li>
        <li><a class="app-menu__item" href="?action=lienhe"><i class='app-menu__icon bx bx-chat'></i><span class="app-menu__label">Liên hệ</span></a></li>
        <li><a class="app-menu__item" href="?action=danhsachbaidang"><i class='app-menu__icon bx bx-message-alt-edit'></i><span class="app-menu__label">Bài đăng</span></a></li>
        <ul>
            <a class="app-menu__item" href="?action=thembaidang"><span class="app-menu__label" class='fas fa-plus'>Thêm bài đăng</span></a></li>
        </ul>
        
        <li><a class="app-menu__item" href="?action=danhsachdocgia"><i class='app-menu__icon bx bx-user-circle'></i><span class="app-menu__label">Quản lý độc giả</span></a></li>
        <ul>
            <a class="app-menu__item" href="?action=themdocgia"><span class="app-menu__label" class='fas fa-plus'>Thêm độc giả</span></a></li>
        </ul>
        
        <li><a class="app-menu__item" href="?action=danhsachnhaxuatban"><i class='app-menu__icon bx bx-buildings'></i><span class="app-menu__label">Quản lý nhà xuất bản</span></a></li>
        <ul>
            <a class="app-menu__item" href="?action=themnhaxuatban"><span class="app-menu__label" class='fas fa-plus'>Thêm nhà xuất bản</span></a></li>
        </ul>
        
        <li><a class="app-menu__item" href="?action=danhsachsach"><i class='app-menu__icon bx bx-book'></i><span class="app-menu__label">Quản lý sách</span></a></li>
        <ul>
            <a class="app-menu__item" href="?action=themsach"><span class="app-menu__label" class='fas fa-plus'>Thêm sách</span></a></li>
        </ul>
        
        <li><a class="app-menu__item" href="?action=danhsachtacgia"><i class='app-menu__icon bx bx-user-plus'></i><span class="app-menu__label">Quản lý tác giả</span></a></li>
        <ul>
            <a class="app-menu__item" href="?action=themtacgia"><span class="app-menu__label" class='fas fa-plus'>Thêm tác giả</span></a></li>
        </ul>
        
        <li><a class="app-menu__item" href="?action=danhsachtheloai"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý thể loại</span></a></li>
        <ul>
            <a class="app-menu__item" href="?action=themtheloai"><span class="app-menu__label" class='fas fa-plus'>Thêm thể loại</span></a></li>
        </ul>
</aside>

</body>

</html>
