<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header1.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/post.php');

$post = new post();

// Kiểm tra xem có giá trị của $_GET['id'] hay không
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "Tham số id không tồn tại!";
    exit;
}

// Kiểm tra xem form có được submit không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_POST["author"];

    // Thực hiện chỉnh sửa thông tin bài đăng
    $editPost = $post->edit($id, $title, $content, $author);

    // Nếu chỉnh sửa thành công, chuyển hướng về trang danh sách bài đăng
    if ($editPost) {
        echo "<script>window.location = '/Project_Test_10624/admin/index.php';</script>";
        exit;
    } else {
        echo "Cập nhật bài đăng thất bại!";
    }
}

?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách bài đăng</li>
            <li class="breadcrumb-item"><a href="#">Sửa bài đăng</a></li>
        </ul>
    </div>

    <?php
    // Lấy thông tin chi tiết của bài đăng dựa trên id
    $get_id = $post->get_id($id);
    if ($get_id) {
        $result = $get_id->fetch_assoc();
    ?>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form class="row" method="post">
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

                            <div class="form-group col-md-4">
                                <label for="title">Tiêu đề:</label>
                                <input type="text" id="title" name="title" value="<?php echo $result['title']; ?>" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="content">Nội dung:</label>
                                <textarea id="content" name="content" class="form-control" required><?php echo $result['content']; ?></textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="author">Tác giả:</label>
                                <input type="text" id="author" name="author" value="<?php echo $result['author']; ?>" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4">
                                <input type="submit" id="btn" name="btnSave" value="Lưu" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "<script>window.location = 'list.php';</script>";
        exit;
    }
    ?>
</main>
</body>
</html>
