<?php
   session_start();
	error_reporting(E_ERROR | E_PARSE);
	date_default_timezone_set("Asia/Bangkok");
	header('Content-Type: text/html; charset=utf-8');
   define('DB_SERVER', 'http://119.59.104.72:3306');
   // define('DB_USERNAME', $_SESSION['username']);
   // define('DB_PASSWORD', $_SESSION['password']);
   define('DB_USERNAME', 'new');
   define('DB_PASSWORD', 'Bzmu979%');
   define('HOMEPAGE', 'http://localhost/webstock');
   // $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD);
   if($db->connect_error) {
		// header("Location: ".HOMEPAGE."/?login_failed=1");
		die("fail");
	}
   $res = mysql_query("SHOW DATABASES");
   while ($row = mysql_fetch_assoc($res)) {
    echo $row['Database'] . "<br>";
}
?>
