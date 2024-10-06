<?php
require ('../class/adminlogin.php');

$class = new adminlogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $login_check = $class->login_admin($username, $password);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

    <div class="login-container">
        <div class="login-box">
            <h2>Admin Login</h2>
            <span>
                <?php
                    if (isset ($login_check))
                    {
                        echo $login_check;
                    }
                ?>
            </span>
            <form action="login.php" method="post">
                <div class="textbox">
                    <input type="text" id="username" placeholder="Username" name="username">
                </div>
                <div class="textbox">
                    <input type="password" id="password" placeholder="Password" name="password">
                </div>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
</body>
</html>
