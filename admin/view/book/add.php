<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/book.php'); ?>

<?php
// Khởi tạo đối tượng book
$book = new book();

// Lấy danh sách các tác giả
$authors = $book->getAu();

// Lấy danh sách các thể loại
$categories = $book->getCate();

// Lấy danh sách các nhà xuất bản
$publishers = $book->getPublisher();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $book_name = $_POST["book_name"];
    $au_id = $_POST["au_id"];               // Author ID
    $cate_id = $_POST["cate_id"];           // Category ID
    $pub_id = $_POST["pub_id"];             // Publisher ID
    $page = $_POST["page"];                 // Number of pages
    $status = $_POST["status"];             // Book status
    $image = $_FILES["image"];              // Image file
    $summary = $_POST["summary"];           // Book summary

    // Upload image and get the result (filename or error message)
    $uploadResult = $book->uploadImage($image);

    // If the upload is successful (returns filename), use it
    if (is_string($uploadResult)) { // Thay đổi điều kiện này
        $image_name = $uploadResult;  // Lưu tên file ảnh nếu upload thành công
    } else {
        $addImage = $uploadResult;  // Thông báo lỗi upload nếu có
    }

    // Nếu upload thành công, thêm tác giả vào database
    if (isset($image_name)) { // Kiể
        $addBook = $book->add($book_id, $book_name, $au_id, $cate_id, $pub_id, $page, $status, $image_name, $summary);
        if (!$addBook) {
            $addBook = "Lỗi: Không thể thêm sách. " . mysqli_error($book->db->link);  // Detailed error if add fails
        }
    } else {
        $addBook = "Lỗi: Không thể thêm sách vì không tải được ảnh.";
    }
}
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách sách</li>
            <li class="breadcrumb-item"><a href="#">Thêm sách</a></li>
        </ul>
    </div>

    <!-- Display the result of adding the book and image upload -->
    <?php if (isset($addBook)) { echo "<div class='alert alert-success'>$addBook</div>"; } ?>
    <?php if (isset($addImage)) { echo "<div class='alert alert-info'>$addImage</div>"; } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="row" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-12">
                            <label for="book_name">Tên sách:</label>
                            <input type="text" name="book_name" id="book_name" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="au_id">Mã tác giả:</label>
                            <select id="au_id" name="au_id" class="form-control">
                                <?php while ($row = mysqli_fetch_array($authors)) { ?>
                                    <option value="<?php echo $row['au_id']; ?>"><?php echo $row['au_id']; ?>. <?php echo $row['au_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="cate_id">Mã thể loại:</label>
                            <select name="cate_id" id="cate_id" class="form-control">
                                <?php while ($row = mysqli_fetch_array($categories)) { ?>
                                    <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_id']; ?>. <?php echo $row['cate_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="pub_id">Mã xuất bản:</label>
                            <select name="pub_id" id="pub_id" class="form-control">
                                <?php while ($row = mysqli_fetch_array($publishers)) { ?>
                                    <option value="<?php echo $row['pub_id']; ?>"><?php echo $row['pub_id']; ?>. <?php echo $row['pub_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="page">Số trang:</label>
                            <input type="text" name="page" id="page" class="form-control">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="status">Trạng thái</label>
                            <select name="status" class="form-control" id="status">
                                <option value="Còn">Còn</option>
                                <option value="Hết">Hết</option>
                                <option value="Chờ bổ sung">Chờ bổ sung</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="image">Hình ảnh:</label>
                            <input type="file" id="image" name="image" class="form-control" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="summary">Giới thiệu:</label>
                            <input type="text" name="summary" id="summary" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="btnSave" value="Thêm sách" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
