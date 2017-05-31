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
   mysqli_set_charset($conn, "utf8");
   $error = '';
   $sql = 'CREATE USER "' . $_POST['username'] . '"@"localhost" IDENTIFIED BY "' . $_POST['password'] . '"';
   // echo $sql;
   $result1 = $conn->query($sql);
   $error .= $conn->error . '\n';
   if($_POST['admin'] == '1') {
      $sql = 'GRANT ALL PRIVILEGES ON * . * TO "' . $_POST['username'] . '"@"localhost"';
   } else {
      $sql = 'GRANT SELECT ON * . * TO "' . $_POST['username'] . '"@"localhost"';
   }
   $result2 = $conn->query($sql);
   $error .= $conn->error;
   if($result1 && $result2) {
      echo 'success';
   } else {
      echo $error;
   }
?>
