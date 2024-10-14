<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header1.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/publisher.php');

$publisher = new publisher();

// Kiểm tra xem có giá trị của $_GET['pub_id'] hay không
if (isset($_GET['pub_id'])) {
    $pub_id = $_GET['pub_id'];
} else {
    echo "Tham số pub_id không tồn tại!";
    exit;
}

// Kiểm tra xem form có được submit không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $pub_id = $_POST['pub_id'];
    $pub_name = $_POST['pub_name'];
    $year = $_POST['year'];

    // Thực hiện chỉnh sửa thông tin nhà xuất bản
    $editPub = $publisher->edit($pub_id, $pub_name, $year);

    // Nếu chỉnh sửa thành công, chuyển hướng về trang danh sách nhà xuất bản
    if ($editPub) {
        echo "<script>window.location = '/Project_Test_10624/admin/index.php';</script>";
        exit;
    } else {
        echo "Cập nhật nhà xuất bản thất bại!";
    }
}
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách nhà xuất bản</li>
            <li class="breadcrumb-item"><a href="#">Sửa nhà xuất bản</a></li>
        </ul>
    </div>

    <?php
    // Lấy thông tin chi tiết của nhà xuất bản dựa trên pub_id
    $get_id = $publisher->get_id($pub_id);
    if ($get_id) {
        $result = $get_id->fetch_assoc();
        if ($result) {
            // Khởi tạo các giá trị từ kết quả lấy về
            $pub_name = $result['pub_name'];
            $year = $result['year'];
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="edit.php" method="post">
                        <input type="hidden" name="pub_id" value="<?php echo $pub_id; ?>">

                        <div class="form-group col-md-4">
                            <label for="pub_name">Tên nhà xuất bản:</label>
                            <input type="text" name="pub_name" value="<?php echo $pub_name; ?>" class="form-control" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="year">Năm thành lập:</label>
                            <input type="text" name="year" value="<?php echo $year; ?>" class="form-control" required>
                        </div>

                        <input type="submit" id="btn" name="btnSave" value="Lưu" class="btn btn-primary btn-block">
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
        echo "Không tìm thấy thông tin nhà xuất bản!";
    }
    ?>

</main>

</body>
</html>
