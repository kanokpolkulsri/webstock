<?php
   session_start();
	error_reporting(E_ERROR | E_PARSE);
	date_default_timezone_set("Asia/Bangkok");
   define('DB_SERVER', 'localhost');
   // define('DB_USERNAME', $_SESSION['username']);
   // define('DB_PASSWORD', $_SESSION['password']);
   define('DB_USERNAME', 'user1');
   define('DB_PASSWORD', '1q2w3e4r');
   define('DB_DATABASE', 'projects');
   define('HOMEPAGE', '.');
   // $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
   mysqli_set_charset($conn, "utf8");
   $sql = 'DELETE FROM project_map WHERE ProjWBS = '. $_GET['ProjWBS'];
   $result1 = $conn->query($sql);
   $sql = 'DROP DATABASE project_'. $_GET['ProjWBS'];
   $result2 = $conn->query($sql);
   if ($result1 && $result2) {
      echo "success";
   }
?>
