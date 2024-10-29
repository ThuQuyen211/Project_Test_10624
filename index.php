<?php require ('header.php'); ?>

			<!--************************************
					Best Selling Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>Sách</span>Những cuốn sách trong thư viện</h2>
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
													</a>
												</figure>
												<div class="tg-postbookcontent">
													<div class="tg-themetagbox"><span class="tg-themetag"><?php echo $row['cate_name']; ?></span></div>
													<div class="tg-booktitle">
														<h3><a href="detail.php?book_id=<?php echo $row['book_id']; ?>"><?php echo $row['book_name']; ?></a></h3>
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
								<h2>Mới Được Thêm</h2>
								</div>
								<div class="tg-description">
									<p>Chúng tôi vừa bổ sung những tài liệu mới nhất để phục vụ nhu cầu đọc và nghiên cứu của bạn. Hãy khám phá thêm nhiều kiến thức và nội dung hấp dẫn ngay hôm nay!</p>
								</div>
								<div class="tg-btns">
									<a class="tg-btn tg-active" href="javascript:void(0);">Xem Tất Cả</a>
									<a class="tg-btn" href="javascript:void(0);">Tìm Hiểu Thêm</a>
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
					Latest News Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2><span>Bài đăng</span>Tin mới nhất</h2>
                </div>
            </div>
            <div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
                <?php if ($posts && $posts->num_rows > 0): ?>
                    <?php while ($row = $posts->fetch_assoc()): ?>
                        <article class="item tg-post">
                            <div class="tg-postcontent">
                                <div class="tg-themetagbox"><span class="tg-themetag"><?php echo htmlspecialchars($row['created_at']); ?></span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="javascript:void(0);"><?php echo htmlspecialchars($row['title']); ?></a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);"><?php echo htmlspecialchars($row['author']); ?></a></span>
                                <div class="tg-postdesc"><?php echo htmlspecialchars($row['content']); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No posts available at the moment.</p>
                <?php endif; ?>
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
<?php require('footer.php'); ?>