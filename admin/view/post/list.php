<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/class/post.php'); ?>
<?php
$post = new post();

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Thực hiện tìm kiếm theo từ khóa (nếu có)
$results = $post->search($keyword);
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách bài đăng</b></a></li>
        </ul>
        <div id="clock"></div>
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
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Người viết</th>
                                <th>Nội dung</th>
                                <th>Thời gian</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody id="postTableBody">
                            <?php if ($results) : while ($row = $results->fetch_assoc()) : ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['title']; ?></td>
                                    <td><?= $row['author']; ?></td>
                                    <td><?= $row['content']; ?></td>
                                    <td><?= $row['created_at']; ?></td>
                                    <td>
                                        <a href="view/post/edit.php?id=<?= $row['id']; ?>" title="Sửa"><i class="fas fa-pencil-alt"></i></a> || 
                                        <a href="view/post/delete.php?id=<?= $row['id']; ?>" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.getElementById('search').addEventListener('input', function() {
    let keyword = this.value;

    // Gửi yêu cầu AJAX đến server
    fetch('view/post/search.php?keyword=' + encodeURIComponent(keyword))
        .then(response => response.text())
        .then(data => {
            document.getElementById('postTableBody').innerHTML = data; // Cập nhật bảng kết quả
        });
});
</script>

</body>
</html>
