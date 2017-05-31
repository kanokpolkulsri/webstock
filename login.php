<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	date_default_timezone_set("Asia/Bangkok");
	header('Content-Type: text/html; charset=utf-8');
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', $_POST['username']);
	define('DB_PASSWORD', $_POST['password']);
	define('DB_DATABASE', 'projects');
	$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
	if($conn->connect_error || DB_USERNAME == '' || DB_PASSWORD == '') {
		header("Location: ./?login_failed=1");
		die();
	}
   mysqli_set_charset($conn, "utf8");
	$_SESSION['username'] = DB_USERNAME;
	$_SESSION['password'] = DB_PASSWORD;
	$sql = 'SELECT State FROM users WHERE Username = "' . DB_USERNAME . '"';
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
		$_SESSION['admin'] = 0;
		if($row['State'] == 'admin') {
			$_SESSION['admin'] = 1;
		}
		header("Location: ./categorize.php");
	}
?>
