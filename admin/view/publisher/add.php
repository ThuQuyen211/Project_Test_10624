<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/publisher.php'); ?>

<?php
$publisher = new publisher();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pub_id = $_POST['pub_id'];
    $pub_name = $_POST['pub_name'];
    $year = $_POST['year'];

    $addPub = $publisher->add($pub_id, $pub_name, $year);
}
?>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách nhà xuất bản</li>
            <li class="breadcrumb-item"><a href="#">Thêm nhà xuất bản</a></li>
        </ul>
    </div>

    <?php if (isset($addPub)) { echo $addPub; } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form method="post">
                        <input type="hidden" id="pub_id" name="pub_id" value="">

                        <div class="form-group col-md-12">
                            <label for="pub_name">Tên nhà xuất bản: </label>
                            <input type="text" id="pub_name" name="pub_name" class="form-control" value="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="year">Năm thành lập: </label>
                            <input type="text" id="year" name="year" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <input type="submit" id="btn" name="btnSave" value="Thêm nhà xuất bản" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
