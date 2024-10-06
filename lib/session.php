<?php
/**
 * Session Class
 **/
class Session {
    public static function init() {
        if (version_compare(phpversion(), '8.2.12', '<')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
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
        if (self::get("adminlogin") == false){
            self::destroy();
            header("Location: ../admin/login.php"); // Thêm exit sau header để ngăn chặn mã tiếp tục chạy
        }
    }

    public static function checkLogin() {
        self::init();
        if (self::get("adminlogin") == true) {
            header("Location: ../admin/index.php"); // Thêm exit sau header
            // Thêm exit sau header để ngăn chặn mã tiếp tục chạy
        }
    }

    public static function destroy() {
        session_destroy();
        header("Location: ../admin/login.php");
     // Thêm exit sau header để ngăn chặn mã tiếp tục chạy
    }
}
?>
