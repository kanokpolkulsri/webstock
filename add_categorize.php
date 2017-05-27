<?php
   session_start();
	error_reporting(E_ERROR | E_PARSE);
	date_default_timezone_set("Asia/Bangkok");
	header('Content-Type: text/html; charset=utf-8');
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', $_SESSION['username']);
   define('DB_PASSWORD', $_SESSION['password']);
   define('DB_DATABASE', 'tmdseo4');
   define('HOMEPAGE', 'http://localhost/webstock');
   // $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if($db->connect_error) {
      header("Location: ".HOMEPAGE."/?login_failed=1");
      die();
   }
   try {
      $sql = "CREATE DATABASE project_".$_GET['project_name'];
      // echo $sql;
      if ($db->query($sql) === TRUE) {
          echo "success";
      } else {
          echo $db->error;
      }

   } catch (Exception $e) {
      // echo 'Caught exception: ',  $e->getMessage(), "\n";
      echo "error";
   }
?>
