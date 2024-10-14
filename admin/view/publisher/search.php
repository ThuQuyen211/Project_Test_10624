<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/publisher.php'); ?>
<?php

$publisher = new publisher();
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Gọi function search
$result = $publisher->search($keyword);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['pub_id'] . '</td>';
        echo '<td>' . $row['pub_name'] . '</td>';
        echo '<td>' . $row['year'] . '</td>';
        echo '<td>';
        echo '<a href="view/publisher/edit.php?pub_id=' . $row['pub_id'] . '" pub_name="Sửa"><i class="fas fa-pencil-alt"></i></a> || ';
        echo '<a href="view/publisher/delete.php?pub_id=' . $row['pub_id'] . '" pub_name="Xóa" onclick="return confirm(\'Bạn có chắc muốn xóa?\')"><i class="fas fa-trash-alt"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="6">Không tìm thấy bài đăng nào.</td></tr>';
}
?>
