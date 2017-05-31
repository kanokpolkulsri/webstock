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
   if($conn->connect_error) {
      die('connection error');
   }
   mysqli_set_charset($conn, "utf8");
   $sql = 'SELECT * FROM project_map ORDER BY LastUpdate DESC';
   $result = $conn->query($sql);

   // $result = $conn->query("SHOW DATABASES;");
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
