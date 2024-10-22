<?php
/**
 * Session Class
 **/
class Session {
    public static function init() {
        // Bắt đầu session nếu chưa bắt đầu, kiểm tra phiên bản PHP hiện tại
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $val) {
        $_SESSION[$key] = $val;
    }

    public static function get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function checkSession() {
        self::init();
        if (self::get("adminlogin") == false) {
            self::destroy();
            header("Location: ../admin/login.php");
            exit(); // Ngăn mã tiếp tục chạy sau khi chuyển hướng
        }
    }

    public static function checkLogin() {
        self::init();
        if (self::get("adminlogin") == true) {
            header("Location: ../admin/index.php");
            exit(); // Ngăn mã tiếp tục chạy sau khi chuyển hướng
        }
    }

    public static function destroy() {
        session_destroy();
        header("Location: ../admin/login.php");
        exit(); // Ngăn mã tiếp tục chạy sau khi chuyển hướng
    }
}
?>
