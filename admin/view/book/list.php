<?php require ('header.php'); ?>
<?php require('../class/book.php'); ?>
<?php
$book = new book();
?>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách sách, tài liệu</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="container mt-5">
                            <!-- Form tìm kiếm -->
                            <input class="form-control" type="search" id="search" placeholder="Tìm kiếm theo tên sách, tác giả, thể loại, nhà xuất bản" aria-label="Search">
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã sách</th>
                                <th>Tên sách</th>
                                <th>Tên tác giả</th>
                                <th>Tên thể loại</th>
                                <th>Tên nhà xuất bản</th>
                                <th>Số trang</th>
                                <th>Trạng thái</th>
                                <th>Hình ảnh</th>
                                <th>Giới thiệu</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody id="bookTableBody">
                            <?php
                            $result = $book->show();
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['book_id']; ?></td>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['au_name']; ?></td>
                                <td><?php echo $row['cate_name']; ?></td>
                                <td><?php echo $row['pub_name']; ?></td>
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
    let keyword = this.value.trim();

    // Nếu không có từ khóa, tải lại toàn bộ danh sách
    if (keyword === '') {
        location.reload();
        return;
    }

    // Gửi yêu cầu AJAX đến file search.php
    fetch('view/book/search.php?keyword=' + encodeURIComponent(keyword))
        .then(response => response.text())
        .then(data => {
            document.getElementById('bookTableBody').innerHTML = data; // Cập nhật bảng kết quả
        })
        .catch(error => console.error('Error fetching search results:', error));
});
</script>

</body>
</html>
