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
   // $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);

   $sql = 'SELECT * FROM project_map ORDER BY LastUpdate';
   $result = $db->query($sql);

   // $result = $db->query("SHOW DATABASES;");
   if ($result->num_rows > 0) {
      $output = '[';
      while($row = $result->fetch_assoc()) {
         $output .= '{ "ProjWBS" : "' . $row['ProjWBS'] . '", "ProjName" : "' . $row['ProjName']. '"}, ';
      }
      $output = substr($output, 0, strlen($output)-2);
      $output .= ']';
      echo $output;
   } else {
       echo "0";
   }
?>
