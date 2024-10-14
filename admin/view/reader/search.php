<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/reader.php'); ?>

<?php
$reader = new reader();
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Gọi hàm tìm kiếm trong class Reader
$results = $reader->search($keyword);

if ($results) {
    while ($row = $results->fetch_assoc()) {
?>
<tr>
    <td><?php echo $row['read_id']; ?></td>
    <td><?php echo $row['read_name']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['mail']; ?></td>
    <td>
        <a href="edit.php?read_id=<?php echo $row['read_id']; ?>" title="Sửa"><i class="fas fa-pencil-alt"></i></a> ||
        <a href="delete.php?read_id=<?php echo $row['read_id']; ?>" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
    </td>
</tr>
<?php
    }
} else {
    echo '<tr><td colspan="6">Không tìm thấy độc giả nào.</td></tr>';
}
?>
