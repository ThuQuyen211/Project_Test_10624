<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/category.php'); ?>
<?php
$category = new category();

// Nhận từ khóa tìm kiếm từ người dùng
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Thực hiện tìm kiếm theo từ khóa (nếu có)
$result = $category->search($keyword);

// Tạo HTML cho bảng kết quả
if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['cate_id'] . '</td>';
        echo '<td>' . $row['cate_name'] . '</td>';
        echo '<td>' . $row['note'] . '</td>';
        echo '<td>
                <a href="view/category/edit.php?cate_id=' . $row['cate_id'] . '" title="Sửa"><i class="fas fa-pencil-alt"></i></a> || 
                <a href="view/category/delete.php?cate_id=' . $row['cate_id'] . '" title="Xóa" onclick="return confirm(\'Bạn có chắc muốn xóa?\')"><i class="fas fa-trash-alt"></i></a>
              </td>';
        echo '</tr>';
    }
} else {
    echo "<tr><td colspan='4'>Không tìm thấy thể loại nào.</td></tr>";
}
?>
