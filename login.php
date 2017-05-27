<?php
   error_reporting(E_ERROR | E_PARSE);
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', $_POST['username']);
   define('DB_PASSWORD', $_POST['password']);
   define('DB_DATABASE', 'test');
   // $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if($db->connect_error) {
      die($db->connect_error);
   } else {
      echo "Login success.";
   }
?>
