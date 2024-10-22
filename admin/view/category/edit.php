<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header1.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/category.php'); ?>

<?php
// Khởi tạo đối tượng category
$category = new category();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cate_id = $_POST["cate_id"];
    $cate_name = $_POST["cate_name"];
    $note = $_POST["note"];

    // Update category
    $editCat = $category->edit($cate_id, $cate_name, $note);
    if (!$editCat) {
        $editCat = "Lỗi: Không thể cập nhật thể loại. " . mysqli_error($category->db->link);
    } else {
        echo "<script>window.location = '/Project_Test_10624/admin/index.php';</script>";
        exit;
    }
}

// Lấy thông tin thể loại theo cate_id
if (isset($_GET['cate_id'])) {
    $cate_id = $_GET['cate_id'];
    $get_id = $category->get_id($cate_id);
    if ($get_id) {
        $result = $get_id->fetch_assoc();
    } else {
        echo "Không tìm thấy thông tin thể loại!";
        exit;
    }
} else {
    echo "ID thể loại không hợp lệ!";
    exit;
}
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách thể loại</li>
            <li class="breadcrumb-item"><a href="#">Sửa thể loại</a></li>
        </ul>
    </div>

    <?php if (isset($editCat)) { echo "<div class='alert alert-danger'>$editCat</div>"; } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="row" method="post">
                        <input type="hidden" id="cate_id" name="cate_id" value="<?php echo $result['cate_id']; ?>">

                        <div class="form-group col-md-12">
                            <label for="cate_name">Tên thể loại:</label>
                            <input type="text" id="cate_name" name="cate_name" class="form-control" value="<?php echo $result['cate_name']; ?>" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="note">Mô tả:</label>
                            <textarea id="note" name="note" class="form-control" required><?php echo $result['note']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" id="btn" name="btnSave" value="Cập nhật thể loại" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
