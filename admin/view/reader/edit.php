<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header1.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/reader.php');
$reader = new reader();
// Kiểm tra giá trị của $_GET['read_id']
if (isset($_GET['read_id'])) {
    $read_id = $_GET['read_id'];
} else {
    echo "Tham số read_id không tồn tại!";
    exit;
}
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $read_id = $_POST['read_id'];
    $read_name = $_POST['read_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $editRead = $reader->edit($read_id, $read_name, $address, $phone, $mail);
    // Nếu cập nhật thành công, chuyển hướng về trang danh sách độc giả
    if ($editRead) {
        echo "<script>window.location = '/Project_Test_10624/admin/index.php';</script>";
        exit;
    } else {
        echo "Cập nhật độc giả thất bại!";
    }
}
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách độc giả</li>
            <li class="breadcrumb-item"><a href="#">Sửa độc giả</a></li>
        </ul>
    </div>

    <?php if (isset($editRead)) { echo $editRead; } ?>

    <?php
    $get_id = $reader->get_id($read_id);
    if ($get_id) {
        $result = $get_id->fetch_assoc();
        if ($result) {
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="edit.php" method="post">
                        <input type="hidden" id="read_id" name="read_id" value="<?php echo $result['read_id']; ?>">

                        <div class="form-group col-md-12">
                            <label for="read_name">Tên độc giả:</label>
                            <input type="text" name="read_name" value="<?php echo $result['read_name']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address">Địa chỉ:</label>
                            <input type="text" name="address" value="<?php echo $result['address']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" name="phone" value="<?php echo $result['phone']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="mail">Email:</label>
                            <input type="text" name="mail" value="<?php echo $result['mail']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                        <button type="submit" id="btn" name="btnSave" class="btn btn-primary btn-small">Lưu</button>
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
    }
    ?>
</main>

</body>
</html>
