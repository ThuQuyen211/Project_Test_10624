<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/category.php'); ?>

<?php
$cate = new category();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cate_id = $_POST["cate_id"];
    $cate_name = $_POST["cate_name"];
    $note = $_POST["note"];

    $addCate = $cate->add($cate_id, $cate_name, $note);
}
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách thể loại</li>
            <li class="breadcrumb-item"><a href="#">Thêm thể loại</a></li>
        </ul>
    </div>

    <?php if (isset($addCate)) { echo $addCate; } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="row" method="post">
                        <input type="hidden" id="cate_id" name="cate_id" value="">

                        <div class="form-group col-md-12">
                            <label for="cate_name">Tên thể loại:</label>
                            <input type="text" id="cate_name" name="cate_name" class="form-control" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="note">Nội dung:</label>
                            <textarea id="note" name="note" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="btnSave" value="Thêm thể loại" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
