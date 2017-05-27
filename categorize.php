<!DOCTYPE html>
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
	if($db->connect_error) {
		header("Location: ".HOMEPAGE."/?login_failed=1");
		die();
	}
	$_SESSION['username'] = DB_USERNAME;
	$_SESSION['password'] = DB_PASSWORD;
?>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body>
	<p class="title-cate">WELCOME</p>
	<div class="add">
		<input type="input" name="locate" class="input-value-add">
		<button class="button-add"> + </button>
		<!--<button class="button-delete"> - </button>-->
	</div>
	<div class="location"></div>


	<script type="text/javascript">
		var buttonadd = $('.button-add');
		var inputadd = $('.input-value-add');
		var locationadd = $('.location');
		var location_empty = locationadd.html();

		// function addlocation(input){
		// 	locationadd.append('<a href="show.html"><button class="btn-location">'+input+'</button></a>');
		// }

		buttonadd.click(function(){
			var link = './add_categorize.php';
			$.get(link + '?project_name=' + inputadd.val(), function(data) {
				if(data !== "success") {
					alert(data);
				}
				get_project();
			});
		});

		function get_project() {
			locationadd.html(location_empty);
			$.get('./get_project.php', function(data) {
				// console.log(data);
				if(data === "0") {
					return;
				}
				var projects = JSON.parse(data);
				for(var i = 0; i < projects.length; i++) {
					locationadd.append('<a href="show.html"><button class="btn-location">'+projects[i].substring('project_'.length)+'</button></a>');
				}
			});
		}

		$(document).ready(function() {
			get_project();
		});
	</script>

</body>
</html>
