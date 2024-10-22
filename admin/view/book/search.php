<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/book.php'); ?>
<?php
$book = new book();
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Thực hiện tìm kiếm theo từ khóa
$results = $book->search($keyword);

if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['book_id']; ?></td>
            <td><?php echo $row['book_name']; ?></td>
            <td><?php echo isset($row['au_name']) ? $row['au_name'] : 'N/A'; ?></td>
            <td><?php echo isset($row['cate_name']) ? $row['cate_name'] : 'N/A'; ?></td>
            <td><?php echo isset($row['pub_name']) ? $row['pub_name'] : 'N/A'; ?></td>
            <td><?php echo $row['page']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><img style="width:100px" src="../admin/public/images/<?php echo $row['image']; ?>"></td>
            <td><?php echo $row['summary']; ?></td>
            <td>
                <a href="view/book/edit.php?book_id=<?php echo $row['book_id']; ?>" title="Sửa"><i class="fas fa-pencil-alt"></i></a> ||
                <a href="view/book/delete.php?book_id=<?php echo $row['book_id']; ?>" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php
    }
} else {
    echo '<tr><td colspan="10">Không tìm thấy sách nào.</td></tr>';
}
?>
