<?php
require ('header.php');
require_once('class/search_model.php');

// Initialize the search model
$searchModel = new SearchModel();

$searchModel = new SearchModel();
if (isset($_POST['search'])) {
    $keyword = $_POST['query'];
    $results = $searchModel->search($keyword);
    // Handle results here (e.g., display them on the page)
}
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kết quả tìm kiếm</title>
    <link rel="stylesheet" href="users/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="users/public/css/main.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Kết quả tìm kiếm cho: "<?php echo htmlspecialchars($keyword); ?>"</h2>
    
    <?php if (empty($results)) : ?>
        <div class="alert alert-warning text-center">Không tìm thấy kết quả nào.</div>
    <?php else : ?>
        <div class="row">
            <?php while ($row = $results->fetch_assoc()) : ?>
                <div class="col-md-4 mb-4">
                    <div class="tg-postbook card shadow-sm"> <!-- Thêm lớp card để tạo bóng -->
                        <figure class="tg-featureimg">
                            <img src="/Project_Test_10624/admin/public/images/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['book_name']); ?>" class="card-img-top" style="width: 80%; height: auto; margin: auto; display: block;">
                        </figure> <!-- Đóng tg-featureimg -->
                        
                        <div class="tg-postbookcontent card-body"> <!-- Thêm lớp card-body -->
                            <div class="tg-themetagbox mb-2">
                                <span class="tg-themetag badge bg-primary"><?php echo htmlspecialchars($row['cate_name']); ?></span>
                            </div>
                            <div class="tg-booktitle">
                                <h5><a href="javascript:void(0);" class="text-dark"><?php echo htmlspecialchars($row['book_name']); ?></a></h5>
                            </div>
                            <span class="tg-bookwriter">By: <a href="javascript:void(0);" class="text-secondary"><?php echo htmlspecialchars($row['au_name']); ?></a></span>
                            <div class="tg-bookprice mt-2">
                                <ins>Trạng thái: <?php echo htmlspecialchars($row['status']); ?></ins><br>
                                <p class="summary-text">
                                    <?php 
                                    $summary = $row['summary']; 
                                    echo (strlen($summary) > 100) ? substr($summary, 0, 100) . '...' : $summary; 
                                    ?>
                                </p>
                            </div> <!-- Đóng tg-bookprice -->
                        </div> <!-- Đóng tg-postbookcontent -->
                        
                        <div class="card-footer text-center">
                            <a href="index.php" class="btn btn-primary">Trở về trang chủ</a>
                        </div>
                    </div> <!-- Đóng tg-postbook -->
                </div> <!-- Đóng col-md-4 -->
            <?php endwhile; ?>
        </div> <!-- Đóng row -->
    <?php endif; ?>
</div> <!-- Đóng container -->

<?php require "footer.php"; ?>
