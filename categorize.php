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
	if($db->connect_error || DB_USERNAME == '' || DB_PASSWORD == '') {
		header("Location: ".HOMEPAGE."/?login_failed=1");
		die();
	}
   mysqli_set_charset($db, "utf8");
	$_SESSION['username'] = DB_USERNAME;
	$_SESSION['password'] = DB_PASSWORD;
?>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="s.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body class="body-categorize">
	<p class="title-cate"> WELCOME TMDSEO4</p>
	<div class="cate-data-all">
	<div class="add">
		ชื่อโครงการ : <input type="input" name="locate" class="input-value-name-add" style="margin-right: 20px;">
		WBS No. : <input type="input" name="locate" class="input-value-wbs-add" style="margin-right: 20px;">
		<button class="button-add">เพิ่มโครงการ</button>
	</div><br>
	<div class="add-user">
		เพิ่มสมาชิก <button class="button-show-add-user">+</button><br>
		<div class="add-user-input">
			<ul class="all-row-user">
				<li class="row-user">Username : <input type="input" name="locate" class="input-regis-username"></li>
				<li class="row-user">Password : <input type="input" name="locate" class="input-regis-pass1"></li>
				<li class="row-user">Confirm Password : <input type="input" name="locate" class="input-regis-pass2"></li>
				<li class="row-user">Name : <input type="input" name="locate" class="input-regis-name"></li>
				<li class="row-user">Phone : <input type="input" name="locate" class="input-regis-phone"></li>
				<li class="row-user">Company : <input type="input" name="locate" class="input-regis-company"></li>
				<li class="row-user">Position : <input type="input" name="locate" class="input-regis-position"></li><br>
				<button class="button-add-user">เพิ่มสมาชิก</button>
			</ul>
		</div>
	</div>
	<br>

	<div class="location"></div>



	</div>

	<script type="text/javascript">
	/*
		เพิ่มใหม่ตรง เพิ่มสมาชิก
	*/
		var buttonShowAddUser = $('.button-show-add-user');
		var allRowUser = $('.all-row-user');
		var checkButtonAddUser = false;
		allRowUser.hide();
		buttonShowAddUser.click(function(){
			if(!checkButtonAddUser){
				buttonShowAddUser.addClass('cate-btn-active');
				checkButtonAddUser = true;
				allRowUser.show();
			}else{
				buttonShowAddUser.removeClass('cate-btn-active');
				checkButtonAddUser = false;
				allRowUser.hide();
			}
		});
		var regisUsername = $('.input-regis-username');
		var regisPass1 = $('.input-regis-pass1');
		var regisPass2 = $('.input-regis-pass2');
		var regisName = $('.input-regis-name');
		var regisPhone = $('.input-regis-phone');
		var regisCompany = $('.input-regis-company');
		var regisPosition = $('.input-regis-position');
		var buttonAddUser = $('.button-add-user');
		buttonAddUser.click(function(){
			//ก็เอาค่าจาก regis.. ไปใส่ได้เลย
		});
	/*
		จบส่วนขอการ เพิ่มสมาชิก
	*/




		var buttonadd = $('.button-add');
		var inputname = $('.input-value-name-add');
		var inputwbs = $('.input-value-wbs-add');
		var locationadd = $('.location');
		var location_empty = locationadd.html();

		buttonadd.click(function(){
			var link = './add_categorize.php';
			$.get(link + '?ProjWBS=' + inputwbs.val() + '&ProjName=' + inputname.val(), function(data) {
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
					locationadd.append('<a href="show.html"><button class="btn-location">'+projects[i].ProjName + ' (' + projects[i].ProjWBS.substring('project_')+')</button></a>');
				}
			});
		}

		$(document).ready(function() {
			get_project();
		});
	</script>

</body>
</html>
