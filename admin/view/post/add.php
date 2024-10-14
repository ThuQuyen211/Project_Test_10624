<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/post.php'); ?>

<?php
$post = new post();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $id = $_POST["id"]; // Assuming the id is provided in the form data
    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_POST["author"];

    // Add new post to the database
    $addPost = $post->add($id, $title, $content, $author);
}
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách bài đăng</li>
            <li class="breadcrumb-item"><a href="#">Thêm bài đăng</a></li>
        </ul>
    </div>

    <?php if (isset($addPost)) { echo $addPost; } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="row" method="post">
                        <input type="hidden" id="id" name="id" value="">

                        <div class="form-group col-md-12">
                            <label for="title">Tiêu đề:</label>
                            <input type="text" id="title" name="title" class="form-control" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="content">Nội dung:</label>
                            <textarea id="content" name="content" class="form-control" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="author">Tác giả:</label>
                            <input type="text" id="author" name="author" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="btnSave" value="Thêm bài đăng" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
