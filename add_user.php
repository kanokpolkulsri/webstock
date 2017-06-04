<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    date_default_timezone_set("Asia/Bangkok");
    if(isset($_SESSION['username'])) {
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
        die();
    }
   $sql = 'CREATE USER "' . $_POST['username'] . '"@"localhost" IDENTIFIED BY "' . $_POST['password'] . '"';
   $sql = 'INSERT INTO users (Username,Password,Name,Phone,Company,Position,State,LastUpdate) VALUES ("' . $_POST['username'] . '","' . hash('sha512', $_POST['password']) . '","' . $_POST['name'] . '","' . $_POST['phone'] . '","' . $_POST['company'] . '","' . $_POST['position'] . '","' . $_POST['state'] . '",' . 'NOW())';
   // echo $sql;
   if($conn->query($sql)) {
      echo 'success';
   } else {
      echo $conn->error;
   }
?>
