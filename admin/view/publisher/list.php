<?php require ('header.php') ?>
<?php require('../class/publisher.php'); ?>

<?php
$publisher = new publisher();
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

$results = [];
// Nếu có từ khóa tìm kiếm, gọi hàm search, ngược lại gọi hàm show để lấy toàn bộ danh sách
if ($keyword) {
    $results = $publisher->search($keyword);
} else {
    $results = $publisher->show();
}
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách nhà xuất bản</b></a></li>
        </ul>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="container mt-5">
                                <input class="form-control" type="search" id="search" placeholder="Tìm kiếm theo tên nhà xuất bản" aria-label="Search" value="<?php echo htmlspecialchars($keyword); ?>">
                            </div>
                        </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Mã nhà xuất bản</th>
                                    <th>Tên nhà xuất bản</th>
                                    <th>Năm thành lập</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody id="publisherTableBody">
                                <?php
                                if ($results) {
                                    while ($row = $results->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $row['pub_id']?></td>
                                    <td><?php echo $row['pub_name']?></td>
                                    <td><?php echo $row['year']?></td>
                                    <td>
                                        <a href="view/publisher/edit.php?pub_id=<?php echo $row['pub_id'];?>" title="Sửa"><i class="fas fa-pencil-alt"></i></a> ||
                                        <a href="view/publisher/delete.php?pub_id=<?php echo $row['pub_id']?>" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Không có nhà xuất bản nào.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</main>

<script>
// Xử lý tìm kiếm với AJAX
document.getElementById('search').addEventListener('input', function() {
    let keyword = this.value;

    // Gửi yêu cầu AJAX tới search.php
    fetch('view/publisher/search.php?keyword=' + encodeURIComponent(keyword))
        .then(response => response.text())
        .then(data => {
            document.getElementById('publisherTableBody').innerHTML = data; // Cập nhật bảng kết quả
        });
});
</script>

</body>
</html>
