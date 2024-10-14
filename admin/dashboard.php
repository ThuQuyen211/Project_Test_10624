<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project_Test_10624/admin/header.php');
require('../lib/database.php');
require('../helper/format.php');

class Author {
    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect(); // Đảm bảo kết nối được thực hiện
        $this->fm = new Format();
    }

    public function show() {
        $sql = "SELECT mail, fullname, avatar FROM users WHERE level='0'"; // Bạn có thể thay thế `id = 1` bằng điều kiện phù hợp.
        $result = $this->db->select($sql);
        return $result;
    }
}

$author = new Author();
$adminData = $author->show();

if ($adminData && $adminData->num_rows > 0) {
    $row = $adminData->fetch_assoc();
    $adminEmail = $row['mail'];
    $adminName = $row['fullname'];
    $adminAvatar = 'public/images/' . $row['avatar']; // Giả sử avatar là đường dẫn ảnh
} else {
    $adminName = "Chưa có thông tin";
    $adminEmail = "Không có email";
    $adminAvatar = "admin\public\images\Tac-Gia-Che-Lan-Vien.jpg"; // Hình mặc định nếu không có avatar
}
?>

<body>
    <link rel="stylesheet" href="../admin/public/css/css_dashboard.css">

    <!-- Thông tin admin -->
    <div class="admin-info">
        <img src="<?php echo $adminAvatar; ?>" alt="Avatar Admin">
        <h3><?php echo $adminName; ?></h3>
        <p><?php echo $adminEmail; ?></p>
        <div>Chào mừng bạn đến với trang quản trị.</div>
    </div>
</body>

<?php
require('footer.php');
?>
