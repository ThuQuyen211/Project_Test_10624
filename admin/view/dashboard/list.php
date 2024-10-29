<?php require ('header.php'); ?>
<?php require('../class/dashboard.php'); ?>

<?php
$db = new Dashboard();
$result1 = $db->getAllBooks();
$result2 = $db->getAllReaders();
$result3 = $db->getAllGenres();
$result4 = $db->getOutOfStockBooks();
$result5 = $db->getGenreStatistics();
$result6 = $db->getOutOfStockBooksDetails();

$data = [];
while ($row = $result5->fetch_assoc()) {
    $data[] = $row;
}
?>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['cate_name', 'so_vl'],
                <?php
                foreach ($data as $key) {
                    echo "['" . $key['cate_name'] . "', " . $key['so_vl'] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Biểu đồ thống kê thể loại sách',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
</head>

<body onload="time()" class="app sidebar-mini rtl">
    <!-- Navbar -->
    <header class="app-header">
        <ul class="app-nav">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                Session::destroy();
            }
            ?>
            <li><a class="app-nav__item" href="?action=logout"><i class='bx bx-log-out bx-rotate-180'></i></a></li>
        </ul>
    </header>

    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="app-title">
                    <ul class="app-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><b>Thống kê sách</b></a></li>
                    </ul>
                    <div id="clock"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if ($result1): ?>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon">
                        <i class='fas fa-book fa-3x'></i> <!-- Updated icon -->
                        <div class="info">
                            <h4>Tổng số sách</h4>
                            <p><b><?php echo mysqli_num_rows($result1); ?></b></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($result2): ?>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small info coloured-icon">
                        <i class='fas fa-users fa-3x'></i> <!-- Updated icon -->
                        <div class="info">
                            <h4>Tổng số độc giả</h4>
                            <p><b><?php echo mysqli_num_rows($result2); ?></b></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($result3): ?>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small warning coloured-icon">
                        <i class='fas fa-tags fa-3x'></i> <!-- Updated icon -->
                        <div class="info">
                            <h4>Tổng số thể loại</h4>
                            <p><b><?php echo mysqli_num_rows($result3); ?></b></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($result4): ?>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small warning coloured-icon">
                        <i class='fas fa-exclamation-triangle fa-3x'></i> <!-- Updated icon -->
                        <div class="info">
                            <h4>Hết hàng</h4>
                            <p><b><?php echo mysqli_num_rows($result4); ?></b></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Sách đã hết</h3>
                    <div class="tile-body">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result6) {
                                    while ($row = $result6->fetch_assoc()) {
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
                                            <a href="editdocgia.php?id=<?php echo $row['book_id']; ?>" title="Sửa"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="xoadocgia.php?id=<?php echo $row['book_id']; ?>" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa')"><i class="fas fa-trash-alt"></i></a>
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

        <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
    </main>

    <!-- Essential javascripts for application -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery-confirm.min.js"></script>
</body>
</html>