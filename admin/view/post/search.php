<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/post.php'); ?>
<?php

$post = new post();
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Gọi function search
$result = $post->search($keyword);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['title'] . '</td>';
        echo '<td>' . $row['author'] . '</td>';
        echo '<td>' . $row['content'] . '</td>';
        echo '<td>' . $row['created_at'] . '</td>';
        echo '<td>';
        echo '<a href="view/post/edit.php?id=' . $row['id'] . '" title="Sửa"><i class="fas fa-pencil-alt"></i></a> || ';
        echo '<a href="view/post/delete.php?id=' . $row['id'] . '" title="Xóa" onclick="return confirm(\'Bạn có chắc muốn xóa?\')"><i class="fas fa-trash-alt"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="6">Không tìm thấy bài đăng nào.</td></tr>';
}
?>
