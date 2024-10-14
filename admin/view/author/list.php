<?php require ('header.php'); ?>
<?php require('../class/author.php'); ?>
<?php
$author = new author();
?>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách tác giả</b></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="container mt-5">
                            <!-- Form tìm kiếm -->
                            <input class="form-control" type="search" id="search" placeholder="Tìm kiếm theo tên tác giả" aria-label="Search">
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã tác giả</th>
                                <th>Tên tác giả</th>
                                <th>Năm sinh</th>
                                <th>Hình ảnh</th>
                                <th>Ghi chú</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody id="authorTableBody">
                            <?php
                            $result = $author->show();
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['au_id']?></td>
                                        <td><?php echo $row['au_name']?></td>
                                        <td><?php echo $row['date']?></td>
                                        <td><img style="width:100px" src="../admin/public/images/<?php echo $row["image"]; ?>"></td>
                                        <td><?php echo $row['note']?></td>
                                        <td>
                                            <a href="view/author/edit.php?au_id=<?php echo $row['au_id']?>" title="Sửa"><i class="fas fa-pencil-alt"></i></a> ||
                                            <a href="view/author/delete.php?au_id=<?php echo $row['au_id']?>" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa')"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- JavaScript để xử lý tìm kiếm bằng AJAX -->
<script>
document.getElementById('search').addEventListener('input', function() {
    let keyword = this.value;

    // Gửi yêu cầu AJAX đến file search.php
    fetch('view/author/search.php?keyword=' + encodeURIComponent(keyword))
        .then(response => response.text())
        .then(data => {
            document.getElementById('authorTableBody').innerHTML = data; // Cập nhật bảng kết quả
        });
});
</script>

</body>
</html>
