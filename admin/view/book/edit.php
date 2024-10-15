<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header1.php'); ?>
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

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
} else {
    echo "Tham số book_id không tồn tại!";
    exit;
}

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
    if (isset($image_name)) {
        $editBook = $book->edit($book_id, $book_name, $au_id, $cate_id, $pub_id, $page, $status, $image_name, $summary);
        if (!$editBook) {
            $editBook = "Lỗi: Không thể cập nhật sách. " . mysqli_error($book->db->link);  // Detailed error if update fails
        } else {
            echo "Sửa thành công";
            echo "<script>window.location = '/Project_Test_10624/admin/index.php';</script>";
            exit;
        }
    } else {
        $editBook = "Lỗi: Không thể cập nhật sách vì không tải được ảnh.";
    }
}
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách sách</li>
            <li class="breadcrumb-item"><a href="#">Sửa sách</a></li>
        </ul>
    </div>

    <?php if (isset($editBook)) { echo $editBook; } ?>

    <?php
    // Lấy thông tin sách theo book_id
    $get_id = $book->get_id($book_id);
    if ($get_id) {
        $result = $get_id->fetch_assoc();
        if ($result) {
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" id="book_id" name="book_id" value="<?php echo $result['book_id']; ?>">
                        <div class="form-group col-md-12">
                            <label for="book_name">Tên sách:</label>
                            <input type="text" name="book_name" value="<?php echo $result['book_name']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="au_id">Tác giả:</label>
                            <select name="au_id" class="form-control">
                                <?php foreach ($authors as $author): ?>
                                    <option value="<?php echo $author['au_id']; ?>" <?php echo ($author['au_id'] == $result['au_id']) ? 'selected' : ''; ?>>
                                        <?php echo $author['au_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="cate_id">Thể loại:</label>
                            <select name="cate_id" class="form-control">
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['cate_id']; ?>" <?php echo ($category['cate_id'] == $result['cate_id']) ? 'selected' : ''; ?>>
                                        <?php echo $category['cate_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="pub_id">Nhà xuất bản:</label>
                            <select name="pub_id" class="form-control">
                                <?php foreach ($publishers as $publisher): ?>
                                    <option value="<?php echo $publisher['pub_id']; ?>" <?php echo ($publisher['pub_id'] == $result['pub_id']) ? 'selected' : ''; ?>>
                                        <?php echo $publisher['pub_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="page">Số trang:</label>
                            <input type="number" name="page" value="<?php echo $result['page']; ?>" class="form-control">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="trangthai">Trạng thái:</label>
                            <select name="status" class="form-control" id="trangthai">
                                <option value="Còn" <?php echo ($result['status'] == 'Còn') ? 'selected' : ''; ?>>Còn</option>
                                <option value="Hết" <?php echo ($result['status'] == 'Hết') ? 'selected' : ''; ?>>Hết</option>
                                <option value="Chờ bổ sung" <?php echo ($result['status'] == 'Chờ bổ sung') ? 'selected' : ''; ?>>Chờ bổ sung</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="image">Hình ảnh:</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="summary">Tóm tắt:</label>
                            <textarea name="summary" class="form-control"><?php echo $result['summary']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" id="btn" name="btnSave" value="Lưu" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        } else {
            echo "<script>window.location = 'list.php'</script>";
            exit;
        }
    } else {
        echo "Không tìm thấy thông tin sách!";
    }
    ?>
</main>

</body>
</html>
