<?php
   session_start();
	error_reporting(E_ERROR | E_PARSE);
	date_default_timezone_set("Asia/Bangkok");
	header('Content-Type: text/html; charset=utf-8');
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', $_SESSION['username']);
   define('DB_PASSWORD', $_SESSION['password']);
   // define('DB_USERNAME', 'user1');
   // define('DB_PASSWORD', '1q2w3e4r');
   define('DB_DATABASE', 'projects');
   define('HOMEPAGE', '.');
   $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
   if($db->connect_error) {
    //   header("Location: ".HOMEPAGE."/?login_failed=1");
      die('connection error');
   }

   $sql = "INSERT INTO project_map (ProjWBS, ProjName, LastUpdate) VALUES ('" . $_GET['ProjWBS'] . '\',\'' . $_GET['ProjName'] . '\',NOW())';
   $db->query($sql)
   $sql = "CREATE DATABASE project_".$_GET['ProjWBS'];
   if ($db->query($sql) === TRUE) {
      echo "success";
   } else {
      echo $db->error;
   }
?>
