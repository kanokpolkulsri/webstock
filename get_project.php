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
   define('HOMEPAGE', '.');
   // $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD);
   $result = $db->query("SHOW DATABASES;");
   if ($result->num_rows > 0) {
      $output = '[';
      while($row = $result->fetch_assoc()) {
         $db_name = $row['Database'];
         if(strpos($db_name, 'project_') !== false) {
            $output .= '"' . $db_name . '", ';
         }
      }
      $output = substr($output, 0, strlen($output)-2);
      $output .= ']';
      echo $output;
   } else {
       echo "0";
   }
?>
