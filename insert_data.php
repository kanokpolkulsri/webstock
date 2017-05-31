<?php
   session_start();
   error_reporting(E_ERROR | E_PARSE);
   date_default_timezone_set("Asia/Bangkok");
   define('DB_SERVER', 'localhost');
   // define('DB_USERNAME', $_SESSION['username']);
   // define('DB_PASSWORD', $_SESSION['password']);
   define('DB_USERNAME', 'user1');
   define('DB_PASSWORD', '1q2w3e4r');
   define('DB_DATABASE', 'project_' . $_GET['ProjWBS']);
   define('HOMEPAGE', '.');
   $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
   if($conn->connect_error) {
    //   header("Location: ".HOMEPAGE."/?login_failed=1");
      die('connection error');
   }
   mysqli_set_charset($conn, "utf8");
   $sql = 'INSERT INTO ' . $_GET['table'] . ' VALUES (';
   $data = json_decode($_GET['data']);
   for($i = 0; $i < count($data); $i++) {
      $sql .= '"' . $data[$i] . '", ';
   }
   $sql .= ' NOW())';
   // echo $sql;
   if($conn->query($sql) === TRUE) {
      echo 'success';
   } else {
      echo $conn->error;
   }
?>
