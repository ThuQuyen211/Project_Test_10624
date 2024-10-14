<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/author.php'); ?>

<?php
$author = new author();// Khởi tạo biến để tránh undefined variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $au_id = $_POST["au_id"];
    $au_name = $_POST["au_name"];
    $date = $_POST["date"];
    $note = $_POST["note"];
    $image = $_FILES["image"];  // Lấy mảng $_FILES['image']

    // Upload ảnh và nhận tên file hoặc lỗi
    $uploadResult = $author->uploadImage($image);

// Kiểm tra nếu upload thành công (uploadImage trả về tên file)
    if (is_string($uploadResult)) { // Thay đổi điều kiện này
        $image_name = $uploadResult;  // Lưu tên file ảnh nếu upload thành công
    } else {
        $addImage = $uploadResult;  // Thông báo lỗi upload nếu có
    }

    // Nếu upload thành công, thêm tác giả vào database
    if (isset($image_name)) { // Kiểm tra nếu $image_name đã được gán
        $addAu = $author->add($au_id, $au_name, $date, $note, $image_name);  // Truyền tên file vào phương thức add()
    } else {
        $addAu = "Lỗi: Không thể thêm tác giả vì không tải được ảnh.";
    }
}
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách tác giả</li>
            <li class="breadcrumb-item"><a href="#">Thêm tác giả</a></li>
        </ul>
    </div>

    <!-- Hiển thị kết quả thêm tác giả và upload hình ảnh -->
    <?php if (isset($addAu)) { echo "<div class='alert alert-success'>$addAu</div>"; } ?>
    <?php if (isset($addImage)) { echo "<div class='alert alert-info'>$addImage</div>"; } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="row" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="au_id" name="au_id" value="">

                        <div class="form-group col-md-12">
                            <label for="au_name">Tên tác giả:</label>
                            <input type="text" id="au_name" name="au_name" class="form-control" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="date">Năm sinh:</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="image">Hình ảnh:</label>
                            <input type="file" id="image" name="image" class="form-control" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="note">Ghi chú:</label>
                            <input type="text" id="note" name="note" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" id="btn" name="btnSave" value="Thêm tác giả" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
