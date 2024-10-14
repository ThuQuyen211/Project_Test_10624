<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header1.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/author.php'); ?>

<?php
// Initialize the author class
$author = new author();

// Default variable initialization
$editAu = ''; // For error or success messages

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $au_id = $_POST["au_id"];
    $au_name = $_POST["au_name"];
    $date = $_POST["date"];
    $note = $_POST["note"];
    $image = $_FILES["image"];
    
    // Handle image upload
    if ($image['size'] > 0) {
        $uploadResult = $author->uploadImage($image);
        if (is_string($uploadResult)) {
            $image_name = $uploadResult; // Successful image upload
        } else {
            $editAu = $uploadResult; // Capture upload error
        }
    } else {
        // No new image uploaded, keep the existing one
        $image_name = $_POST['current_image'];
    }

    // Update the author details in the database
    if (isset($image_name)) {
        $editAu = $author->edit($au_id, $au_name, $date, $note, $image_name);
        if (!$editAu) {
            $editAu = "Lỗi: Không thể cập nhật tác giả. " . mysqli_error($author->db->link); // Error if update fails
        } else {
            echo "<script>window.location = '/Project_Test_10624/admin/index.php';</script>";
            exit;
        }
    } else {
        $editAu = "Lỗi: Không thể cập nhật tác giả vì không tải được ảnh.";
    }
}

// Fetch the current author details
if (isset($_GET['au_id'])) {
    $au_id = $_GET['au_id'];
    $get_id = $author->get_id($au_id);
    if ($get_id) {
        $result = $get_id->fetch_assoc();
    } else {
        echo "Không tìm thấy thông tin tác giả!";
        exit;
    }
} else {
    echo "Tham số au_id không tồn tại!";
    exit;
}
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách tác giả</li>
            <li class="breadcrumb-item"><a href="#">Sửa tác giả</a></li>
        </ul>
    </div>

    <!-- Display result of the update -->
    <?php if (!empty($editAu)) { echo "<div class='alert alert-danger'>$editAu</div>"; } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="row" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="au_id" name="au_id" value="<?php echo $result['au_id']; ?>">

                        <div class="form-group col-md-12">
                            <label for="au_name">Tên tác giả:</label>
                            <input type="text" id="au_name" name="au_name" class="form-control" value="<?php echo ($result['au_name']); ?>" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="date">Năm sinh:</label>
                            <input type="date" id="date" name="date" class="form-control" value="<?php echo ($result['date']); ?>" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="image">Hình ảnh (Chọn file mới để thay đổi):</label>
                            <input type="file" id="image" name="image" class="form-control" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="note">Ghi chú:</label>
                            <input type="text" id="note" name="note" class="form-control" value="<?php echo ($result['note']); ?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" id="btn" name="btnSave" value="Cập nhật tác giả" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
