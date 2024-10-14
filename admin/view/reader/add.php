<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/reader.php'); ?>

<?php
$reader = new reader();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $read_id = $_POST['read_id'];
    $read_name = $_POST['read_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];

    $addRead = $reader->add($read_id, $read_name, $address, $phone, $mail);
}
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách độc giả</li>
            <li class="breadcrumb-item"><a href="#">Thêm độc giả</a></li>
        </ul>
    </div>

    <?php if (isset($addRead)) { echo $addRead; } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="add.php" method="post">
                        <input type="hidden" id="read_id" name="read_id" value="">

                        <div class="form-group col-md-12">
                            <label for="read_name">Tên độc giả: </label>
                            <input type="text" id="read_name" name="read_name" value="" class="form-control">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="address">Địa chỉ: </label>
                            <input type="text" id="address" name="address" value="" class="form-control">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="phone">Số điện thoại: </label>
                            <input type="text" id="phone" name="phone" value="" class="form-control">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="mail">Mail: </label>
                            <input type="text" id="mail" name="mail" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" id="btn" name="btnSave" value="Thêm độc giả" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
