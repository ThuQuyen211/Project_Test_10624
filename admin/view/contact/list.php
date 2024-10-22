<?php require('header.php'); ?>
<?php require('../class/contact.php'); ?>

<?php
$contact = new contact();
$results = $contact->show();
?>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách liên hệ</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="container mt-5">
                                <form class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Tin nhắn</th>
                            <th>Thời gian</th>
                        </tr>
                        <?php if ($results): while ($row = $results->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['message']; ?></td>
                                <td><?= $row['submitted_at']; ?></td>
                            </tr>
                        <?php endwhile; endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
</html>
