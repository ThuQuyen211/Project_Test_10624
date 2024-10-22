<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/category.php'); ?>
<?php
$category = new category();

// Nhận từ khóa tìm kiếm từ người dùng
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Thực hiện tìm kiếm theo từ khóa (nếu có)
$result = $category->search($keyword);
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách thể loại sách</b></a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="container mt-5">
                            <input class="form-control" type="search" id="search" placeholder="Tìm kiếm theo tên thể loại" aria-label="Search" value="<?php echo htmlspecialchars($keyword); ?>">
                        </div>
                    </div>
                </div>
                
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Mã thể loại</th>
                            <th>Tên thể loại</th>
                            <th>Ghi chú</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody id="categoryTableBody">
                        <?php
                        if ($result) {
                            // Hiển thị kết quả tìm kiếm
                            while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['cate_id']; ?></td>
                                <td><?php echo $row['cate_name']; ?></td>
                                <td><?php echo $row['note']; ?></td>
                                <td>
                                    <a href="view/category/edit.php?cate_id=<?php echo $row['cate_id']; ?>" title="Sửa"><i class="fas fa-pencil-alt"></i></a> || 
                                    <a href="view/category/delete.php?cate_id=<?php echo $row['cate_id']; ?>" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='4'>Không tìm thấy thể loại nào.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
document.getElementById('search').addEventListener('input', function() {
    let keyword = this.value;

    // Gửi yêu cầu AJAX đến server
    fetch('view/category/search.php?keyword=' + encodeURIComponent(keyword))
        .then(response => response.text())
        .then(data => {
            document.getElementById('categoryTableBody').innerHTML = data; // Cập nhật bảng kết quả
        });
});
</script>

</body>
</html>
