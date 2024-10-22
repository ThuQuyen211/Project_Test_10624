<?php
require('header.php');
require_once(__DIR__ . '/lib/database.php');
require_once(__DIR__ . '/class/category.php');
require('controll.php');

// Kiểm tra xem 'cate_id' có được truyền qua URL không
if (isset($_GET['cate_id'])) {
    $cate_id = intval($_GET['cate_id']); // Đảm bảo cate_id là số nguyên
    
    // Tạo một đối tượng từ class category
    $category = new category();

    // Lấy danh sách sách theo category ID
    $data = $category->getBookbyCateid($cate_id);

    // Kiểm tra nếu có dữ liệu trả về
    if ($data->num_rows > 0) {
        // Hiển thị sách
        echo '<div class="container">';
        
        // Nếu có nhiều sách, sử dụng carousel
        if ($data->num_rows > 1) {
            echo '<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">'; // Chỉ tạo carousel khi có nhiều sách

            // Lặp qua từng sách và hiển thị thông tin
            while ($book = $data->fetch_assoc()) {
                echo '<div class="item">'; // Mỗi quyển sách là một item trong carousel
                echo '<div class="tg-postbook">';
                echo '<figure class="tg-featureimg">';
                echo '<div class="tg-bookimg">';
                echo '<div class="tg-frontcover">';
                echo '<img src="/Project_Test_10624/admin/public/images/' . htmlspecialchars($book['image']) . '" alt="' . htmlspecialchars($book['book_name']) . '" style="width: 100%; height: auto;">';
                echo '</div>'; // Đóng tg-frontcover
                echo '<div class="tg-backcover">';
                echo '<img src="/Project_Test_10624/admin/public/images/' . htmlspecialchars($book['image']) . '" alt="' . htmlspecialchars($book['book_name']) . '" style="width: 100%; height: auto;">';
                echo '</div>'; // Đóng tg-backcover
                echo '</div>'; // Đóng tg-bookimg
                echo '<a class="tg-btnaddtowishlist" href="javascript:void(0);">';
                echo '<i class="icon-heart"></i>';
                echo '</a>';
                echo '</figure>'; // Đóng tg-featureimg
                echo '<div class="tg-postbookcontent">';
                echo '<div class="tg-themetagbox"><span class="tg-themetag">' . htmlspecialchars($book['cate_name']) . '</span></div>';
                echo '<div class="tg-booktitle">';
                echo '<h3><a href="javascript:void(0);">' . htmlspecialchars($book['book_name']) . '</a></h3>';
                echo '</div>';
                echo '<span class="tg-bookwriter">By: <a href="javascript:void(0);">' . htmlspecialchars($book['au_name']) . '</a></span>';
                echo '<span class="tg-bookprice">';
                echo '<ins>Trạng thái: ' . htmlspecialchars($book['status']) . '</ins><br>';
                $summary = $book['summary'];
                // Giới hạn độ dài summary tối đa là 100 ký tự
                echo (strlen($summary) > 100) ? substr($summary, 0, 100) . '...' : $summary; 
                echo '</span>'; // Đóng tg-bookprice
                echo '</div>'; // Đóng tg-postbookcontent
                echo '</div>'; // Đóng tg-postbook
                echo '</div>'; // Đóng item
            }

            echo '</div>'; // Đóng tg-bestsellingbooksslider (carousel)
        }else {// Nếu chỉ có một sách, hiển thị đơn giản mà không dùng carousel
        $book = $data->fetch_assoc(); // Lấy sách đầu tiên
        echo '<div class="item">';
        echo '<div class="tg-postbook">';
        echo '<figure class="tg-featureimg">';
        echo '<img src="/Project_Test_10624/admin/public/images/' . htmlspecialchars($book['image']) . '" alt="' . htmlspecialchars($book['book_name']) . '" style="width: 150px">';
        echo '</div>'; // Đóng tg-frontcover
        echo '<a class="tg-btnaddtowishlist" href="javascript:void(0);">';
        echo '</a>';
        echo '</figure>'; // Đóng tg-featureimg
        echo '<div class="tg-postbookcontent">';
        echo '<div class="tg-themetagbox"><span class="tg-themetag">' . htmlspecialchars($book['cate_name']) . '</span></div>';
        echo '<div class="tg-booktitle">';
        echo '<h3><a href="javascript:void(0);">' . htmlspecialchars($book['book_name']) . '</a></h3>';
        echo '</div>';
        echo '<span class="tg-bookwriter">By: <a href="javascript:void(0);">' . htmlspecialchars($book['au_name']) . '</a></span>';
        echo '<span class="tg-bookprice">';
        echo '<ins>Trạng thái: ' . htmlspecialchars($book['status']) . '</ins><br>';
        $summary = $book['summary'];
        // Giới hạn độ dài summary tối đa là 100 ký tự
        echo (strlen($summary) > 100) ? substr($summary, 0, 100) . '...' : $summary; 
        echo '</span>'; // Đóng tg-bookprice
        echo '</div>'; // Đóng tg-postbookcontent
        echo '</div>'; // Đóng tg-postbook
        echo '</div>'; // Đóng item
    }

    echo '</div>'; // Đóng container
} else {
    // Không tìm thấy sách nào
    echo '<div class="container">';
    echo '<h1>No books found in this category.</h1>';
    echo '</div>';
}
} else {
echo '<div class="container">';
echo '<h1>Invalid category ID.</h1>';
echo '</div>';
}

require('footer.php');
?>