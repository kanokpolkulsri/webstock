<!DOCTYPE html>
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
   define('HOMEPAGE', '.');
   $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
   if($conn->connect_error) {
    //   header("Location: ".HOMEPAGE."/?login_failed=1");
      die('connection error');
   }
   mysqli_set_charset($conn, "utf8");
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
<body class="body-show">
	<p class="title-cate">WELCOME</p>
		<div class="wrapper">
			<div class="table-cpe">
				<div class="row header green">
					<div class="cell">วันที่</div>
					<div class="cell">จำนวน</div>
					<div class="cell">หน่วย</div>
					<div class="cell">ราคาต่อหน่วย</div>
					<div class="cell">ราคารวม</div>
					<div class="cell">ผู้รับสินค้า</div>
					<div class="cell">ที่เก็บ</div>
	    		</div>
	    		<div class="row">
					<div class="cell">01/01/2015</div>
					<div class="cell">10</div>
					<div class="cell">ชิ้น</div>
					<div class="cell">5</div>
					<div class="cell">50</div>
					<div class="cell">admin</div>
					<div class="cell">storage1</div>
	    		</div>
	    		<div class="row">
					<div class="cell">02/01/2015</div>
					<div class="cell">120</div>
					<div class="cell">ชิ้น</div>
					<div class="cell">10</div>
					<div class="cell">1200</div>
					<div class="cell">admin</div>
					<div class="cell">storage1</div>
	    		</div>
			</div>
		</div>
	<input type="file" name="file" id="file-cpe" style="display: block;">
	<script type="text/javascript">
		var tablecpe = $('.table-cpe');
		document.getElementById('file-cpe').onchange = function(){
			var file = this.files[0];
			var reader = new FileReader();
			reader.onload = function(progressEvent){
			var lines = this.result.split('\n');
			for(var line = 0; line < lines.length; line++){
				var check = lines[line].split(",");
				tablecpe.append('<div class="row"><div class="cell">'+check[0]+'</div><div class="cell">'+check[1]+'</div><div class="cell">'+check[2]+'</div><div class="cell">'+check[3]+'</div><div class="cell">'+check[4]+'</div></div>');
				}
				console.log(check[1]);
				console.log(check[2]);
			};
			reader.readAsText(file);
		};
	</script>
</body>
</html>