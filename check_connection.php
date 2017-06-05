<?php
    define('TIME_EXPIRE', 30 * 60);
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    date_default_timezone_set("Asia/Bangkok");
    if(isset($_SESSION['username'])) {
        if(time() - $_SESSION['last_activity'] > TIME_EXPIRE) {
            header("Location: ./logout.php?session_expired=1");
            die();
        }
        $_SESSION['last_activity'] = time();
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', $_SESSION['db_username']);
        define('DB_PASSWORD', $_SESSION['db_password']);
        // define('DB_USERNAME', 'user1');
        // define('DB_PASSWORD', '1q2w3e4r');
        define('DB_DATABASE', 'projects');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
        if($conn->connect_error) {
            header("Location: .");
            die('connection error');
        }
        mysqli_set_charset($conn, "utf8");
    } else {
        if($has_page) {
            header("Location: ./?login_failed=1");
        }
        die();
    }
?>
