<?php
session_start();
require_once('class/category.php');
require_once('class/book.php');
require_once('class/author.php');
require_once('class/post.php');
require_once('register.php');
require_once('login.php');
require_once('reader.php');

$category = new category();
$categories = $category->show();

$book = new book();
$books = $book->show();

$bookModel = new book();
$newBooks = $bookModel->get3Book(); // Assuming get3Book() returns the 3 newest books

$author = new author();
$authors = $author->show();

$post = new post();
$posts = $post->show();

$register = new register();
$login = new login();
$reader = new reader();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $read_id = $_POST['read_id'] ?? null;
    $read_name = $_POST['read_name'] ?? null;
    $address = $_POST['address'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $mail = $_POST['mail'] ?? null;
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if (isset($_POST['submit'])) {
        // Handle registration
        $addRead = $register->add($read_id, $read_name, $address, $phone, $mail, $username, $password);
        
        if ($addRead) {
            // Show success message and redirect after 3 seconds
            echo "<script type='text/javascript'>
                    alert('Đăng ký thành công!');
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 3000); // Redirect after 3 seconds
                  </script>";
        } else {
            // Show failure message and redirect after 3 seconds
            echo "<script type='text/javascript'>
                    alert('Đăng ký không thành công!');
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 3000); // Redirect back to registration page after 3 seconds
                  </script>";
        }
    
        exit(); // Stop script execution
    }if (isset($_POST['login'])) {
		// Handle login
		$login_check = $login->login($username, $password);
		
		if ($login_check && is_array($login_check)) {
			$_SESSION['login'] = true;
			$_SESSION['read_id'] = $login_check['read_id'];
		} else {
			echo "<script type='text/javascript'>
					alert('Đăng nhập không thành công.');
					setTimeout(function() {
						window.location.href = 'index.php';
					}, 3000); // Redirect after 3 seconds
				  </script>";
			exit();
	}
}
    }if (isset($_POST['submit'])) {
        // Handle registration
        $addRead = $register->add($read_id, $read_name, $address, $phone, $mail, $username, $password);
        
        if ($addRead) {
            // Show success message and redirect to index.php after 3 seconds
            echo "<script type='text/javascript'>
                    alert('Đăng ký thành công!');
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 3000); // 3 seconds delay
                  </script>";
        } else {
            // Show failure message and redirect back to registration page after 3 seconds
            echo "<script type='text/javascript'>
                    alert('Đăng ký không thành công!');
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 3000); // 3 seconds delay
                  </script>";
        }
        exit(); // Ensure no further code is executed
    } else if (isset($_POST['update'])) {
        // Handle update request
        $editRead = $reader->edit($read_id, $read_name, $address, $phone, $mail, $username, $password);
        
        if ($editRead) {
            // Show success message and redirect to profile page after 3 seconds
            echo "<script type='text/javascript'>
                    alert('Cập nhật thành công!');
                    setTimeout(function() {
                        window.location.href = 'index.php'; // Redirect to profile page
                    }, 3000); // 3 seconds delay
                  </script>";
        } else {
            // Show failure message and remain on the same page after 3 seconds
            echo "<script type='text/javascript'>
                    alert('Cập nhật thông tin thất bại!');
                    setTimeout(function() {
                        window.location.href = 'index.php'; // Redirect back to edit profile page
                    }, 3000); // 3 seconds delay
                  </script>";
        }
        exit(); // Ensure no further code is executed
    }
    
    // Check if the user is logged in
    $login_check = isset($_SESSION['login']) ? $_SESSION['login'] : false;
    $currentUser = null;
    
    if ($login_check && isset($_SESSION['read_id'])) {
        // Retrieve user information based on session read_id
        $currentUser = $reader->get_id($_SESSION['read_id']);
        
        if ($currentUser !== false) {
            // User information can be accessed using $currentUser['column_name']
            // Example: $currentUser['read_name'], $currentUser['email'], etc.
        } else {
            // Handle case where no user is found
            echo "User not found.";
        }
    }
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Library</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="users/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="users/public/css/normalize.css">
    <link rel="stylesheet" href="users/public/css/font-awesome.min.css">
    <link rel="stylesheet" href="users/public/css/icomoon.css">
    <link rel="stylesheet" href="users/public/css/jquery-ui.css">
    <link rel="stylesheet" href="users/public/css/owl.carousel.css">
    <link rel="stylesheet" href="users/public/css/transitions.css">
    <link rel="stylesheet" href="users/public/css/main.css">
    <link rel="stylesheet" href="users/public/css/color.css">
    <link rel="stylesheet" href="users/public/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMK+3c6p3O3CbZ5sxB6PTj9mHDvZ7A9z6+vV3XJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="users/public/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body class="tg-home tg-homeone">
<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
<header id="tg-header" class="tg-header tg-haslayout">
        <div class="tg-middlecontainer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <strong class="tg-logo">
                            <a href="index.php">
                                <img src="\Project_Test_10624\users\public\images\logo_lib.png" alt="company name here" class="logo-small" style="width: 100px; height: auto;">
                            </a>
                            <p class="slogan" style="margin-top: 5px; font-size: 14px; color: #555;">HaiPhong library</p>
                        </strong>
                        <div class="tg-searchbox" style="display: flex; align-items: center; justify-content: center; margin-top: 10px;">
                            <form action="index.php?controller=search&action=search" method="GET" style="position: relative; width: 300px;">
                                <input type="hidden" name="controller" value="search">
                                <input type="hidden" name="action" value="search">
                                <input type="text" name="query" placeholder="Tìm kiếm sách, tác giả..." required style="width: 100%; padding: 8px 40px 8px 10px; border-radius: 20px; border: 1px solid #ccc; outline: none; font-size: 14px;">
                                <button type="submit" style="position: absolute; top: 0; right: 0; height: 100%; width: 40px; background: transparent; border: none; cursor: pointer;">
                                    <i class="fas fa-search" style="color: #333; font-size: 16px;"></i>
                                </button>
                            </form>
                        </div>
                        <div class="tg-wishlistandcart">
                            <!-- Login Form Dropdown -->
                            <div class="dropdown tg-themedropdown tg-wishlistdropdown">
                                <a href="javascript:void(0);" id="tg-wishlist" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-cog"></i>
                                    <span><?php echo $login_check ? 'Cài đặt' : 'Đăng nhập'; ?></span>
                                </a>
                                <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlist">
                                    <div class="modal-body">
                                        <div class="login-form">
                                            <?php if (!$login_check) : ?>
                                                <form method="POST" action="index.php">
                                                    <label>Tên đăng nhập *</label>
                                                    <input name="username" type="text" placeholder="Tên đăng nhập" required />
                                                    <label>Mật khẩu *</label>
                                                    <input name="password" type="password" placeholder="Mật khẩu" required />
                                                    <div class="tg-btns" style="display: flex; gap: 10px; justify-content: center; margin-top: 15px;">
                                                        <input type="submit" name="login" class="tg-btn tg-active" style="padding: 5px 15px; font-size: 12px; width: auto;" value="Đăng nhập">
                                                        <button class="tg-btn" type="reset" style="padding: 5px 15px; font-size: 12px; width: auto;">Hủy</button>
                                                    </div>
                                                    <label class="lost-password">
                                                        <a href="#">Quên mật khẩu?</a>
                                                    </label>
                                                </form>
                                                <hr>
                                                <label>Chưa có tài khoản? Đăng ký ngay!</label>
                                                <form method="POST" action="index.php">
                                                    <input type="hidden" id="read_id" name="read_id" value="">
                                                    <label>Tên đăng nhập *</label>
                                                    <input type="text" name="username" placeholder="Tên đăng nhập" required />
                                                    <label>Mật khẩu *</label>
                                                    <input type="password" name="password" placeholder="Mật khẩu" required />
                                                    <label>Họ và tên *</label>
                                                    <input type="text" name="read_name" placeholder="Họ tên" required />
                                                    <label>Địa chỉ *</label>
                                                    <input type="text" name="address" placeholder="Địa chỉ" required />
                                                    <label>Số điện thoại *</label>
                                                    <input type="text" name="phone" placeholder="Số điện thoại" required />
                                                    <label>Mail *</label>
                                                    <input type="text" name="mail" placeholder="Mail" required />
                                                    <div class="tg-btns" style="display: flex; gap: 10px; justify-content: center; margin-top: 15px;">
                                                        <input type="submit" name="submit" class="tg-btn tg-active" style="padding: 5px 15px; font-size: 12px; width: auto;" value="Đăng kí">
                                                    </div>
                                                </form>
                                            <?php else : ?>
                                                <form method="POST" action="logout.php">
                                                    <div class="tg-btns" style="display: flex; justify-content: center; margin-top: 15px;">
                                                        <input type="submit" class="tg-btn tg-active" style="padding: 5px 15px; font-size: 12px; width: auto;" value="Đăng xuất">
                                                    </div>
                                                </form>
                                                
                                                <button class="tg-btn tg-active" style="width: 100%; margin-top: 10px;" onclick="document.getElementById('edit-profile-form').style.display='block';">Chỉnh sửa thông tin</button>
                                                <div id="edit-profile-form" style="display:none; margin-top: 10px;">
                                                    <h4>Chỉnh sửa thông tin cá nhân</h4>
                                                    <form method="POST" action="index.php">
                                                        <input type="hidden" id="read_id" name="read_id" value="<?php echo ($currentUser['read_id']); ?>">
														<label>Tên đăng nhập *</label>
														<input type="text" name="username" value="<?php echo ($currentUser['username']); ?>" required >
														<label>Mật khẩu *</label>
														<input type="password" name="password" value="<?php echo ($currentUser['password']); ?>" required >
                                                        <label>Họ và tên *</label>
                                                        <input type="text" name="read_name" value="<?php echo ($currentUser['read_name']); ?>" required>
                                                        <label>Địa chỉ *</label>
                                                        <input type="text" name="address" value="<?php echo ($currentUser['address']); ?>" required>
                                                        <label>Số điện thoại *</label>
                                                        <input type="text" name="phone" value="<?php echo ($currentUser['phone']); ?>" required>
                                                        <label>Mail *</label>
                                                        <input type="text" name="mail" value="<?php echo ($currentUser['mail']); ?>" required>
                                                        <div class="tg-btns" style="display: flex; justify-content: center; margin-top: 15px;">
                                                            <input type="submit" name="update" class="tg-btn tg-active" style="padding: 5px 15px; font-size: 12px; width: auto;" value="Cập nhật">
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Login Form Dropdown -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="tg-navigationarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <nav id="tg-nav" class="tg-nav">
                        <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                            <ul>
                                <li>
                                    <a href="index.php"><i class="fas fa-home"></i> Trang chủ</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href=""><i class="fas fa-book"></i> Danh mục sách</a>
                                    <div class="mega-menu">
                                        <ul class="tg-themetabnav" role="tablist">
                                            <?php foreach ($categories as $cat): ?>
                                                <li role="presentation">
                                                    <a href="category.php?cate_id=<?php echo $cat['cate_id']; ?>">
                                                        <?php echo $cat['cate_name']; ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);"><i class="fas fa-user"></i> Danh mục tác giả</a>
                                    <div class="mega-menu">
                                        <ul class="tg-themetabnav" role="tablist">
                                            <?php foreach ($authors as $au): ?>
                                                <li role="presentation">
                                                    <a href="book_au.php?au_id=<?php echo $au['au_id']; ?>">
                                                        <?php echo $au['au_name']; ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="contact.php"><i class="fas fa-phone"></i> Liên hệ</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fas fa-pen"></i> Bài đăng</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fas fa-info-circle"></i> Giới thiệu</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>