<?php
   session_start();
	error_reporting(E_ERROR | E_PARSE);
	date_default_timezone_set("Asia/Bangkok");
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', $_SESSION['username']);
   define('DB_PASSWORD', $_SESSION['password']);
   // define('DB_USERNAME', 'user1');
   // define('DB_PASSWORD', '1q2w3e4r');
   define('DB_DATABASE', 'projects');
   $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
   if($conn->connect_error || $_SESSION['admin'] == 0) {
      die('connection error');
   }
   mysqli_set_charset($conn, "utf8");
   $error = '';
   $sql = 'INSERT INTO users (Username,Name,Phone,Company,Position,State,LastUpdate) VALUES ("' . $_POST['username'] . '","' . $_POST['name'] . '","' . $_POST['phone'] . '","' . $_POST['company'] . '","' . $_POST['position'] . '","' . $_POST['state'] . '",' . 'NOW())';
   $result = $conn->query($sql);
   if($result) {
      echo "success";
   } else {
      echo $conn->error;
   }
?>
