<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/reader.php'); ?>
<?php
$reader = new reader();
$result = $reader->show(); // Lấy danh sách độc giả từ cơ sở dữ liệu
?>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách độc giả</b></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="container mt-5">
                            <!-- Form tìm kiếm -->
                            <input class="form-control" type="search" id="search" placeholder="Tìm kiếm theo tên độc giả, địa chỉ hoặc số điện thoại" aria-label="Search">
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã độc giả</th>
                                <th>Tên độc giả</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ email</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody id="readerTableBody">
                            <?php if ($result && $result->num_rows > 0) : ?>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['read_id']); ?></td>
                                        <td><?php echo htmlspecialchars($row['read_name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                        <td><?php echo htmlspecialchars($row['mail']); ?></td>
                                        <td>
                                            <a href="view/reader/edit.php?read_id=<?php echo $row['read_id']; ?>" title="Sửa"><i class="fas fa-pencil-alt"></i></a> ||
                                            <a href="view/reader/delete.php?read_id=<?php echo $row['read_id']; ?>" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr><td colspan="6">Không tìm thấy độc giả nào.</td></tr>
                            <?php endif; ?>
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

    // Nếu không có từ khóa, lấy lại toàn bộ danh sách
    if (keyword === '') {
        location.reload();
        return;
    }

    // Gửi yêu cầu AJAX đến file search.php
    fetch('view/reader/search.php?keyword=' + encodeURIComponent(keyword))
        .then(response => response.text())
        .then(data => {
            document.getElementById('readerTableBody').innerHTML = data; // Cập nhật bảng kết quả
        })
        .catch(error => console.error('Error fetching search results:', error));
});
</script>

</html>
