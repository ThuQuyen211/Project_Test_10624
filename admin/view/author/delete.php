<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/author.php'); ?>
<?php
$author = new author();

if (isset($_GET['au_id'])) {
    $author_id = $_GET['au_id'];

    // Call the delete method
    $deleteResult = $author->delete($author_id);

    // Check the result of the delete operation
    if ($deleteResult) {
        echo "<script>alert('Tác giả đã được xóa thành công!');</script>";
        header("Location: /Project_Test_10624/admin/index.php");
        exit;
    } else {
        echo "<script>alert('Có lỗi xảy ra khi xóa.');</script>";
    }
} else {
    echo "<script>alert('ID tác giả không hợp lệ.');</script>";
}

?>