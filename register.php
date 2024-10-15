<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'your_database_name');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password
    $full_name = $_POST['full_name'];

    // Check if the username exists
    $checkUser = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($checkUser);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Tên đăng nhập đã tồn tại!";
    } else {
        // Insert new user
        $insertQuery = "INSERT INTO users (username, password, full_name) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param('sss', $username, $password, $full_name);

        if ($stmt->execute()) {
            echo "Đăng kí thành công!";
            header("Location: login.php"); // Redirect to login page after registration
        } else {
            echo "Có lỗi xảy ra, vui lòng thử lại.";
        }
    }
}
?>
