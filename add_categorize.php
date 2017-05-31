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
   define('HOMEPAGE', '.');
   $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
   if($conn->connect_error) {
    //   header("Location: ".HOMEPAGE."/?login_failed=1");
      die('connection error');
   }
   mysqli_set_charset($conn, "utf8");
   $sql = "INSERT INTO project_map (ProjWBS, ProjName, LastUpdate) VALUES ('" . $_GET['ProjWBS'] . '\',\'' . $_GET['ProjName'] . '\',NOW())';
   $conn->query($sql);
   $sql = "CREATE DATABASE project_".$_GET['ProjWBS'];
   if ($conn->query($sql) === FALSE) {
      echo $conn->error;
   }

   $conn2 = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, 'project_' . $_GET['ProjWBS']);
   mysqli_set_charset($conn2, "utf8");
   $sql = "CREATE TABLE tb_inv (
      ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      InvNo VARCHAR(50) NOT NULL,
      InvName VARCHAR(1000) NOT NULL,
      InvAmount INT UNSIGNED NOT NULL,
      InvUnit VARCHAR(100) NOT NULL,
      InvPriceUnit FLOAT(20, 10) NOT NULL,
      InvPriceTotal FLOAT(40, 10) NOT NULL,
      InvStorage VARCHAR(400) NOT NULL,
      LastUpdate DATETIME NOT NULL
   ) CHARSET=utf8";
   if ($conn2->query($sql) === FALSE) {
      echo $conn->error;
   }
?>
