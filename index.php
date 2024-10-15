<?php
require_once('lib/database.php');
require_once('class/category.php');
require_once('class/book.php');
require_once('class/author.php');

$category = new category();
$categories = $category->show();

$book = new book();
$books = $book->show();

$bookModel = new book();
$newBooks = $bookModel->get3Book(); // Assuming get3Book() method returns the 3 newest books

$author = new author();
$authors = $author->show();
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<script src="users/public/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body class="tg-home tg-homeone">

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
<header id="tg-header" class="tg-header tg-haslayout">
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo">
                        <a href="index-2.html">
                            <img src="\Project_Test_10624\users\public\images\logo_lib.png" alt="company name here" class="logo-small" style="width: 100px; height: auto;">
                        </a>
                        <p class="slogan" style="margin-top: 5px; font-size: 14px; color: #555;">Khẩu hiệu của bạn ở đây</p>
                    </strong>
						<div class="tg-wishlistandcart">
						<!-- Login Form (inside the dropdown) -->
						<div class="dropdown tg-themedropdown tg-wishlistdropdown">
							<a href="javascript:void(0);" id="tg-wishlist" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="tg-themebadge">3</span>
								<i class="icon-heart"></i>
								<span>Đăng nhập</span>
							</a>
							<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlist">
								<div class="modal-body">
									<div class="login-form">
										<form method="POST" action="login.php">
											<label>Tên đăng nhập *</label>
											<input name="username" type="text" placeholder="Tên đăng nhập" required />
											<label>Mật khẩu *</label>
											<input name="password" type="password" placeholder="Mật khẩu" required />
											<div class="checkbox checkbox-primary">
												<input id="checkbox" type="checkbox">
												<label for="checkbox">Nhớ mật khẩu</label>
											</div>
											<div class="tg-btns" style="display: flex; gap: 10px; justify-content: center; margin-top: 15px;">
												<!-- Adjusted button size and centered them -->
												<button class="tg-btn tg-active" type="submit" style="padding: 5px 15px; font-size: 12px; width: auto;">Đăng nhập</button>
												<button class="tg-btn" type="reset" style="padding: 5px 15px; font-size: 12px; width: auto;">Hủy</button>
											</div>
											<label class="lost-password">
												<a href="#">Quên mật khẩu?</a>
											</label>
										</form>
									</div>
								</div>
							</div>
						</div>


						<!-- Registration Form (inside the dropdown) -->
						<div class="dropdown tg-themedropdown tg-minicartdropdown">
							<a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="tg-themebadge">3</span>
								<i class="icon-cart"></i>
								<span>Đăng kí</span>
							</a>
							<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
								<div class="modal-body">
									<div class="login-form">
										<form method="POST" action="register.php">
											<label>Tên đăng nhập *</label>
											<input type="text" name="username" placeholder="Tên đăng nhập" required />
											<label>Mật khẩu *</label>
											<input type="password" name="password" placeholder="Mật khẩu" required />
											<label>Họ và tên *</label>
											<input type="text" name="full_name" placeholder="Họ tên" required />
											<div class="tg-btns" style="display: flex; gap: 10px; justify-content: center; margin-top: 15px;">
												<!-- Adjusted button size and centered them -->
												<button class="tg-btn tg-active" type="submit" style="padding: 5px 15px; font-size: 12px; width: auto;">Đăng kí</button>
												<button class="tg-btn" type="reset" style="padding: 5px 15px; font-size: 12px; width: auto;">Hủy</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
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
                                    <a href="javascript:void(0);"><i class="fas fa-home"></i> Trang chủ</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);"><i class="fas fa-book"></i> Danh mục sách</a>
                                    <div class="mega-menu">
                                        <ul class="tg-themetabnav" role="tablist">
                                            <?php foreach ($categories as $cat): ?>
                                                <li role="presentation">
                                                    <a href="category.php?id=<?php echo $cat['cate_id']; ?>">
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
                                                    <a href="category.php?id=<?php echo $au['au_id']; ?>">
                                                        <?php echo $au['au_name']; ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fas fa-phone"></i> Liên hệ</a>
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

		<!--************************************
				Header End
		*************************************-->

			<!--************************************
					Best Selling Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>People’s Choice</span>Bestselling Books</h2>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
								<?php
								if ($books) {
									// Lặp qua từng cuốn sách
									while ($row = $books->fetch_assoc()) {
										?>
										<!-- Book Item -->
										<div class="item">
											<div class="tg-postbook">
												<figure class="tg-featureimg">
													<div class="tg-bookimg">
														<div class="tg-frontcover"><img src="\Project_Test_10624\admin\public\images\<?php echo $row['image']; ?>" alt="<?php echo $row['book_name']; ?>"></div>
														<div class="tg-backcover"><img src="\Project_Test_10624\admin\public\images\<?php echo $row['image']; ?>" alt="<?php echo $row['book_name']; ?>"></div>
													</div>
													<a class="tg-btnaddtowishlist" href="javascript:void(0);">
														<i class="icon-heart"></i>
														<span>add to wishlist</span>
													</a>
												</figure>
												<div class="tg-postbookcontent">
													<div class="tg-themetagbox"><span class="tg-themetag"><?php echo $row['cate_name']; ?></span></div>
													<div class="tg-booktitle">
														<h3><a href="javascript:void(0);"><?php echo $row['book_name']; ?></a></h3>
													</div>
													<span class="tg-bookwriter">By: <a href="javascript:void(0);"><?php echo $row['au_name']; ?></a></span>
													<span class="tg-bookprice">
														<ins>Trạng thái: <?php echo $row['status']; ?></ins><br>
														<?php 
														$summary = $row['summary'];
														// Giới hạn độ dài summary tối đa là 100 ký tự (có thể điều chỉnh)
														echo (strlen($summary) > 100) ? substr($summary, 0, 100) . '...' : $summary; 
														?>
													</span>
												</div>
											</div>
										</div>
										<?php
									}
								} else {
									echo "<p>No books found.</p>";
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!--************************************
					Featured Item End
			*************************************-->
			<!--************************************
					New Release Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-newrelease">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="tg-sectionhead">
									<h2><span>Taste The New Spice</span> New Release Books</h2>
								</div>
								<div class="tg-description">
									<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
								</div>
								<div class="tg-btns">
									<a class="tg-btn tg-active" href="javascript:void(0);">View All</a>
									<a class="tg-btn" href="javascript:void(0);">Read More</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="row">
									<div class="tg-newreleasebooks">
										<?php if (!empty($newBooks)) : ?>
											<?php foreach ($newBooks as $row) : ?>
												<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
													<div class="tg-postbook">
														<figure class="tg-featureimg">
															<div class="tg-bookimg">
																<div class="tg-frontcover">
																	<img src="admin/public/images/<?php echo $row['image']; ?>" alt="<?php echo $row['book_name']; ?>">
																</div>
																<div class="tg-backcover">
																	<img src="admin/public/images/<?php echo $row['image']; ?>" alt="<?php echo $row['book_name']; ?>">
																</div>
															</div>
															<a class="tg-btnaddtowishlist" href="javascript:void(0);">
																<i class="icon-heart"></i>
																<span>add to wishlist</span>
															</a>
														</figure>
														<div class="tg-postbookcontent">
															<ul class="tg-bookscategories">
																<li><a href="javascript:void(0);"><?php echo $row['cate_name']; ?></a></li>
															</ul>
															<div class="tg-booktitle">
																<h3><a href="javascript:void(0);"><?php echo $row['book_name']; ?></a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);"><?php echo $row['au_name']; ?></a></span>
															<span class="tg-bookprice">
																<ins>Trạng thái: <?php echo $row['status']; ?></ins><br>
																<?php 
																$summary = $row['summary'];
																echo (strlen($summary) > 100) ? substr($summary, 0, 100) . '...' : $summary; 
																?>
															</span>
														</div>
													</div>
												</div>
											<?php endforeach; ?>
										<?php else : ?>
											<p>No new books available.</p>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					New Release End
			*************************************-->
			<!--************************************
					Collection Count Start
			*************************************-->
			<section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-04.jpg">
				<div class="tg-sectionspace tg-collectioncount tg-haslayout">
					<div class="container">
						<div class="row">
							<div id="tg-collectioncounters" class="tg-collectioncounters">
								<div class="tg-collectioncounter tg-drama">
									<div class="tg-collectioncountericon">
										<i class="icon-bubble"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Drama</h2>
										<h3 data-from="0" data-to="6179213" data-speed="8000" data-refresh-interval="50">6,179,213</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-horror">
									<div class="tg-collectioncountericon">
										<i class="icon-heart-pulse"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Horror</h2>
										<h3 data-from="0" data-to="3121242" data-speed="8000" data-refresh-interval="50">3,121,242</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-romance">
									<div class="tg-collectioncountericon">
										<i class="icon-heart"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Romance</h2>
										<h3 data-from="0" data-to="2101012" data-speed="8000" data-refresh-interval="50">2,101,012</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-fashion">
									<div class="tg-collectioncountericon">
										<i class="icon-star"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Fashion</h2>
										<h3 data-from="0" data-to="1158245" data-speed="8000" data-refresh-interval="50">1,158,245</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Collection Count End
			*************************************-->
			<!--************************************
					Picked By Author Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>Some Great Books</span>Picked By Authors</h2>
								<a class="tg-btn" href="javascript:void(0);">View All</a>
							</div>
						</div>
						<div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="images/books/img-10.jpg" alt="image description"></div>
										</div>
										<div class="tg-hovercontent">
											<div class="tg-description">
												<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
											</div>
											<strong class="tg-bookpage">Book Pages: 206</strong>
											<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
											<strong class="tg-bookprice">Price: $23.18</strong>
											<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
										</div>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="javascript:void(0);">Seven Minutes In Heaven</a></h3>
										</div>
										<span class="tg-bookwriter">By: <a href="javascript:void(0);">Sunshine Orlando</a></span>
										<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Add To Basket</em>
										</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="images/books/img-11.jpg" alt="image description"></div>
										</div>
										<div class="tg-hovercontent">
											<div class="tg-description">
												<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
											</div>
											<strong class="tg-bookpage">Book Pages: 206</strong>
											<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
											<strong class="tg-bookprice">Price: $23.18</strong>
											<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
										</div>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="javascript:void(0);">Slow And Steady Wins The Race</a></h3>
										</div>
										<span class="tg-bookwriter">By: <a href="javascript:void(0);">Drusilla Glandon</a></span>
										<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Add To Basket</em>
										</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="images/books/img-12.jpg" alt="image description"></div>
										</div>
										<div class="tg-hovercontent">
											<div class="tg-description">
												<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
											</div>
											<strong class="tg-bookpage">Book Pages: 206</strong>
											<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
											<strong class="tg-bookprice">Price: $23.18</strong>
											<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
										</div>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="javascript:void(0);">There’s No Time Like The Present</a></h3>
										</div>
										<span class="tg-bookwriter">By: <a href="javascript:void(0);">Patrick Seller</a></span>
										<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Add To Basket</em>
										</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="images/books/img-10.jpg" alt="image description"></div>
										</div>
										<div class="tg-hovercontent">
											<div class="tg-description">
												<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
											</div>
											<strong class="tg-bookpage">Book Pages: 206</strong>
											<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
											<strong class="tg-bookprice">Price: $23.18</strong>
											<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
										</div>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="javascript:void(0);">Seven Minutes In Heaven</a></h3>
										</div>
										<span class="tg-bookwriter">By: <a href="javascript:void(0);">Sunshine Orlando</a></span>
										<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Add To Basket</em>
										</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="images/books/img-11.jpg" alt="image description"></div>
										</div>
										<div class="tg-hovercontent">
											<div class="tg-description">
												<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
											</div>
											<strong class="tg-bookpage">Book Pages: 206</strong>
											<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
											<strong class="tg-bookprice">Price: $23.18</strong>
											<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
										</div>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="javascript:void(0);">Slow And Steady Wins The Race</a></h3>
										</div>
										<span class="tg-bookwriter">By: <a href="javascript:void(0);">Drusilla Glandon</a></span>
										<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Add To Basket</em>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Picked By Author End
			*************************************-->
			<!--************************************
					Testimonials Start
			*************************************-->
			<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-05.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
								<div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
									<div class="item tg-testimonial">
										<figure><img src="images/author/imag-02.jpg" alt="image description"></figure>
										<blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Holli Fenstermacher</h3>
											<span>Manager @ CIFP</span>
										</div>
									</div>
									<div class="item tg-testimonial">
										<figure><img src="images/author/imag-02.jpg" alt="image description"></figure>
										<blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Holli Fenstermacher</h3>
											<span>Manager @ CIFP</span>
										</div>
									</div>
									<div class="item tg-testimonial">
										<figure><img src="images/author/imag-02.jpg" alt="image description"></figure>
										<blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Holli Fenstermacher</h3>
											<span>Manager @ CIFP</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Testimonials End
			*************************************-->
			
			<!--************************************
					Call to Action Start
			*************************************-->
			<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-06.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-calltoaction">
									<h2>Open Discount For All</h2>
									<h3>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore.</h3>
									<a class="tg-btn tg-active" href="javascript:void(0);">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Call to Action End
			*************************************-->
			<!--************************************
					Latest News Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>Latest News &amp; Articles</span>What's Hot in The News</h2>
								<a class="tg-btn" href="javascript:void(0);">View All</a>
							</div>
						</div>
						<div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="images/blog/img-01.jpg" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="images/blog/img-02.jpg" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="images/blog/img-03.jpg" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="images/blog/img-04.jpg" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">Dance Like Nobody’s Watching</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="images/blog/img-02.jpg" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="images/blog/img-03.jpg" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Latest News End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		<footer id="tg-footer" class="tg-footer tg-haslayout">
			<div class="tg-footerarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-clientservices">
								<li class="tg-devlivery">
									<span class="tg-clientserviceicon"><i class="icon-rocket"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Fast Delivery</h3>
										<p>Shipping Worldwide</p>
									</div>
								</li>
								<li class="tg-discount">
									<span class="tg-clientserviceicon"><i class="icon-tag"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Open Discount</h3>
										<p>Offering Open Discount</p>
									</div>
								</li>
								<li class="tg-quality">
									<span class="tg-clientserviceicon"><i class="icon-leaf"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Eyes On Quality</h3>
										<p>Publishing Quality Work</p>
									</div>
								</li>
								<li class="tg-support">
									<span class="tg-clientserviceicon"><i class="icon-heart"></i></span>
									<div class="tg-titlesubtitle">
										<h3>24/7 Support</h3>
										<p>Serving Every Moments</p>
									</div>
								</li>
							</ul>
						</div>
						<div class="tg-threecolumns">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol">
									<strong class="tg-logo"><a href="javascript:void(0);"><img src="images/flogo.png" alt="image description"></a></strong>
									<ul class="tg-contactinfo">
										<li>
											<i class="icon-apartment"></i>
											<address>Suit # 07, Rose world Building, Street # 02, AT246T Manchester</address>
										</li>
										<li>
											<i class="icon-phone-handset"></i>
											<span>
												<em>0800 12345 - 678 - 89</em>
												<em>+4 1234 - 4567 - 67</em>
											</span>
										</li>
										<li>
											<i class="icon-clock"></i>
											<span>Serving 7 Days A Week From 9am - 5pm</span>
										</li>
										<li>
											<i class="icon-envelope"></i>
											<span>
												<em><a href="mailto:support@domain.com">support@domain.com</a></em>
												<em><a href="mailto:info@domain.com">info@domain.com</a></em>
											</span>
										</li>
									</ul>
									<ul class="tg-socialicons">
										<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
										<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgetnavigation">
									<div class="tg-widgettitle">
										<h3>Shipping And Help Information</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li><a href="javascript:void(0);">Terms of Use</a></li>
											<li><a href="javascript:void(0);">Terms of Sale</a></li>
											<li><a href="javascript:void(0);">Returns</a></li>
											<li><a href="javascript:void(0);">Privacy</a></li>
											<li><a href="javascript:void(0);">Cookies</a></li>
											<li><a href="javascript:void(0);">Contact Us</a></li>
											<li><a href="javascript:void(0);">Our Affiliates</a></li>
											<li><a href="javascript:void(0);">Vision &amp; Aim</a></li>
										</ul>
										<ul>
											<li><a href="javascript:void(0);">Our Story</a></li>
											<li><a href="javascript:void(0);">Meet Our Team</a></li>
											<li><a href="javascript:void(0);">FAQ</a></li>
											<li><a href="javascript:void(0);">Testimonials</a></li>
											<li><a href="javascript:void(0);">Join Our Team</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgettopsellingauthors">
									<div class="tg-widgettitle">
										<h3>Top Selling Authors</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li>
												<figure><a href="javascript:void(0);"><img src="images/author/imag-09.jpg" alt="image description"></a></figure>
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Jude Morphew</a></h4>
													<p>21,658 Published Books</p>
												</div>
											</li>
											<li>
												<figure><a href="javascript:void(0);"><img src="images/author/imag-10.jpg" alt="image description"></a></figure>
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Shaun Humes</a></h4>
													<p>20,257 Published Books</p>
												</div>
											</li>
											<li>
												<figure><a href="javascript:void(0);"><img src="images/author/imag-11.jpg" alt="image description"></a></figure>
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Kathrine Culbertson</a></h4>
													<p>15,686 Published Books</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-newsletter">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<h4>Signup Newsletter!</h4>
							<h5>Consectetur adipisicing elit sed do eiusmod tempor incididunt.</h5>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<form class="tg-formtheme tg-formnewsletter">
								<fieldset>
									<input type="email" name="email" class="form-control" placeholder="Enter Your Email ID">
									<button type="button"><i class="icon-envelope"></i></button>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-footerbar">
				<a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="icon-chevron-up"></i></a>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<span class="tg-paymenttype"><img src="images/paymenticon.png" alt="image description"></span>
							<span class="tg-copyright">2017 All Rights Reserved By &copy; Book Library</span>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="users/public/js/vendor/jquery-library.js"></script>
	<script src="users/public/js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="users/public/js/owl.carousel.min.js"></script>
	<script src="users/public/js/jquery.vide.min.js"></script>
	<script src="users/public/js/countdown.js"></script>
	<script src="users/public/js/jquery-ui.js"></script>
	<script src="users/public/js/parallax.js"></script>
	<script src="users/public/js/countTo.js"></script>
	<script src="users/public/js/appear.js"></script>
	<script src="users/public/js/gmap3.js"></script>
	<script src="users/public/js/main.js"></script>
</body>

</html>