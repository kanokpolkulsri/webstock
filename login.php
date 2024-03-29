<?php
	include 'database_setting.php';
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	date_default_timezone_set("Asia/Bangkok");
	header('Content-Type: text/html; charset=utf-8');
	define('DB_SERVER', 'tmdseo4.com');
	define('DB_USERNAME', 'login');
	define('DB_PASSWORD', LOGIN_PASSWORD);
	define('DB_DATABASE', 'projects');
	$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
	if($conn->connect_error) {
		// header("Location: ./?login_failed=1");
		die($conn->connect_error);
	}
	mysqli_set_charset($conn, "utf8");
	$sql = 'SELECT * FROM users WHERE Username = "' . $_POST['username'] . '"';
	$result = $conn->query($sql);
	$pass = false;
	if($result->num_rows > 0) {
		$password = $_POST['password'];
		$row = $result->fetch_assoc();
		if(hash_equals($row['Password'], crypt($password, $row['Password']))) {
			$pass = true;
		}
	}
	if($pass) {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['name'] = $row['Name'];
		$_SESSION['admin'] = 0;
		$_SESSION['db_username'] = 'normal_user';
		$_SESSION['db_password'] = NORMAL_USER_PASSWORD;
		$_SESSION['last_activity'] = time();
		if($row['State'] == 'admin') {
			$_SESSION['admin'] = 1;
			$_SESSION['db_username'] = 'admin_user';
			$_SESSION['db_password'] = ADMIN_USER_PASSWORD;
		}
		header("Location: ./categorize.php");
	} else {
		header("Location: ./?login_failed=1");
	}

?>
