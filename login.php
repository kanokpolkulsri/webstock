<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	date_default_timezone_set("Asia/Bangkok");
	header('Content-Type: text/html; charset=utf-8');
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', $_POST['username']);
	define('DB_PASSWORD', $_POST['password']);
	define('HOMEPAGE', '.');
	// $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	$db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD);
	if($db->connect_error || DB_USERNAME == '' || DB_PASSWORD == '') {
		header("Location: ".HOMEPAGE."/?login_failed=1");
		die();
	}
   mysqli_set_charset($db, "utf8");
	$_SESSION['username'] = DB_USERNAME;
	$_SESSION['password'] = DB_PASSWORD;
   header("Location: ./categorize.php");
?>
