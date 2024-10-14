<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/author.php'); ?>
<?php
$author = new author();
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Thực hiện tìm kiếm theo từ khóa
$results = $author->search($keyword); // Bạn cần đảm bảo phương thức search đã được định nghĩa trong class author.

if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['au_id']; ?></td>
            <td><?php echo $row['au_name']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><img style="width:100px" src="../admin/public/images/<?php echo $row['image']; ?>"></td>
            <td><?php echo $row['note']; ?></td>
            <td>
                <a href="view/author/edit.php?au_id=<?php echo $row['au_id']; ?>" title="Sửa"><i class="fas fa-pencil-alt"></i></a> ||
                <a href="view/author/delete.php?au_id=<?php echo $row['au_id']; ?>" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php
    }
} else {
    echo '<tr><td colspan="6">Không tìm thấy tác giả nào.</td></tr>';
}
?>
