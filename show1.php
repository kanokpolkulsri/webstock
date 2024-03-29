<!DOCTYPE html>
 <!-- <?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    date_default_timezone_set("Asia/Bangkok");
    if(isset($_SESSION['username'])) {
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', $_SESSION['db_username']);
        define('DB_PASSWORD', $_SESSION['db_password']);
        // define('DB_USERNAME', 'user1');
        // define('DB_PASSWORD', '1q2w3e4r');
        define('DB_DATABASE', 'projects');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
        if($conn->connect_error) {
            header("Location: .");
            die('connection error');
        }
        mysqli_set_charset($conn, "utf8");
    } else {
        header("Location: ./?login_failed=1");
        die();
    }
?> -->
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body class="body-show">
	<div class="show-title-Proj">
		<!-- <p class="show-title-Proj-name">NAME</p>
		<p class="show-title-Proj-WBS">WBS</p> -->
		<?php
			echo '<p class="show-title-Proj-name">' . $_GET['ProjName'] .'</p>';
			echo '<p class="show-title-Proj-WBS">' . $_GET['ProjWBS'] .'</p>';
		?>
	</div>
	<div class="show-mode">
		<button class="show-btn-inv">สินค้าคงคลัง</button>
		<button class="show-btn-rec">ประวัติการรับสินค้า</button>
		<button class="show-btn-out">ประวัติการเบิกสินค้า</button>
	</div>
	<div class="show-all-data-inv">
		<div class="input-search-inv">
			รหัสสินค้า : <input type="input" name="locate" class="input-search-inv-no">
			ชื่อสินค้า : <input type="input" name="locate" class="input-search-inv-name">
		</div>
		<div class="wrapper">
			<div class="table-inv">
				<div class="row header green">
					<div class="cell">รหัสสินค้า</div>
					<div class="cell">ชื่อสินค้า</div>
					<div class="cell">จำนวน</div>
					<div class="cell">หน่วย</div>
					<div class="cell">ราคาต่อหน่วย</div>
					<div class="cell">ราคารวม</div>
					<div class="cell">ที่เก็บสินค้า</div>
	    		</div>
				<!-- <?php
					$sql = 'SELECT * FROM ' . $_GET['ProjWBS'] . '__tb_inv';
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
						while($row = $result->fetch_assoc()) {
							echo '<div class="row">';
							foreach($row as $key => $val) {
								if($key == 'ID' || $key == 'LastUpdate') {
									continue;
								}
								echo '<div class="cell">' . $val . '</div>';
							}
							echo '</div>';
						}
					} else {
						echo 'no result.';
					}
				?> -->
			</div>
		</div>
       <?php
         if($_SESSION['admin'] == 1) {
      		echo '<input type="file" name="file" id="file-inv" style="display: block;">';
         }
      ?>
	</div>

	<div class="show-all-history-rec">
		<div class="input-search-history-rec">
			วันที่ : <input type="input" name="locate" class="input-search-history-rec-date">
			รหัสสินค้า : <input type="input" name="locate" class="input-search-history-rec-no">
			ชื่อสินค้า : <input type="input" name="locate" class="input-search-history-rec-name">
		</div>
		<div class="wrapper">
			<div class="table-rec">
				<div class="row header green">
					<div class="cell">วันที่</div>
					<div class="cell">รหัสสินค้า</div>
					<div class="cell">ชื่อสินค้า</div>
					<div class="cell">จำนวน</div>
					<div class="cell">หน่วย</div>
					<div class="cell">ราคาต่อหน่วย</div>
					<div class="cell">ราคารวม</div>
					<div class="cell">ผู้รับสินค้า</div>
					<div class="cell">รับจากบริษัท</div>
					<div class="cell">ที่เก็บสินค้า</div>
	    		</div>
				 <?php
					$sql = 'SELECT * FROM ' . $_GET['ProjWBS'] . '__tb_rec';
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
						while($row = $result->fetch_assoc()) {
							echo '<div class="row">';
							foreach($row as $key => $val) {
								if($key == 'ID' || $key == 'LastUpdate') {
									continue;
								}
								echo '<div class="cell">' . $val . '</div>';
							}
							echo '</div>';
						}
					} else {
						echo 'no result.';
					}
				?>
			</div>
		</div>
       <?php
         if($_SESSION['admin'] == 1) {
      		echo '<input type="file" name="file" id="file-rec" style="display: block;">';
         }
      ?>
	</div>

	<div class="show-all-history-out">
		<div class="input-search-history-out">
			วันที่ : <input type="input" name="locate" class="input-search-history-out-date">
			รหัสสินค้า : <input type="input" name="locate" class="input-search-history-out-no">
			ชื่อสินค้า : <input type="input" name="locate" class="input-search-history-out-name">
		</div>
		<div class="wrapper">
			<div class="table-out">
				<div class="row header green">
					<div class="cell">วันที่</div>
					<div class="cell">รหัสสินค้า</div>
					<div class="cell">ชื่อสินค้า</div>
					<div class="cell">จำนวน</div>
					<div class="cell">หน่วย</div>
					<div class="cell">ราคาต่อหน่วย</div>
					<div class="cell">ราคารวม</div>
					<div class="cell">ผู้เบิกสินค้า</div>
					<div class="cell">บริษัทผู้เบิก</div>
					<div class="cell">ผู้ดูแลระบบ</div>
					<div class="cell">ที่เก็บสินค้า</div>
	    		</div>
				 <?php
					$sql = 'SELECT * FROM ' . $_GET['ProjWBS'] . '__tb_out';
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
						while($row = $result->fetch_assoc()) {
							echo '<div class="row">';
							foreach($row as $key => $val) {
								if($key == 'ID' || $key == 'LastUpdate') {
									continue;
								}
								echo '<div class="cell">' . $val . '</div>';
							}
							echo '</div>';
						}
					} else {
						echo 'no result.';
					}
				?>
			</div>
		</div>
      <?php
         if($_SESSION['admin'] == 1) {
            echo '<input type="file" name="file" id="file-out" style="display: block;">';
         }
      ?>
	</div>

	<?php
      if($_SESSION['admin'] == 1) {
         echo '<div class="show-delete-this-proj">
      		<button class="show-btn-delete"><b>DELETE THIS PROJECT</b></button><br>
      		<div class="show-delete-confirm">
      		Project Name  <input class="show-input-del-name"/><br>
      		WBS No.  <input class="show-input-del-WBS"/><br>
      		<button class="show-btn-confirm-del"><b>ยืนยันการลบ</b></button>
      		</div>
      	</div>';
      }
   ?>

	<script type="text/javascript">
		/*
			เพิ่มเติมช่องสำหรับการค้นหา ตอนจะเอาไปใช้ก็ xx.val() นาจาา
		*/
		var searchInvNo = $('.input-search-inv-no');
		var searchInvName = $('.input-search-inv-name');

		var searchHisRecDate = $('.input-search-history-rec-date');
		var searchHisRecNo = $('.input-search-history-rec-no');
		var searchHisRecName = $('.input-search-history-rec-name');

		var searchHisOutDate = $('.input-search-history-out-date');
		var searchHisOutNo = $('.input-search-history-out-no');
		var searchHisOutName = $('.input-search-history-out-name');


		/*
			ลบโครงการ
		*/
		var buttonDel = $('.show-btn-delete'); //ปุ่มเปิดว่าจะกรอกชื่อและwbs
		var buttonDelConfirm = $('.show-btn-confirm-del'); //ปุ่มที่ยืนยันว่าจะลบข้อมูลแล้ว
		var inputDelName = $('.show-input-del-name');
		var inputDelWBS = $('.show-input-del-WBS');
		var deleteConfirm = $('.show-delete-confirm'); //div ที่คลุมส่วนกรอกข้อมูล
		var checkButtonDelClicked = false;
		deleteConfirm.hide();

		//กดปุ่มเลือกว่าจะลบ
		buttonDel.click(function(){
			if(!checkButtonDelClicked){
				checkButtonDelClicked = true;
				deleteConfirm.show();
			}else{
				checkButtonDelClicked = false;
				deleteConfirm.hide();
			}
		});

		//กดปุ่มยืนยัน ก็คือจะเอาค่าจาก input ไปเทียบกับ database
		buttonDelConfirm.click(function(){
			// inputDelName.val() //ค่าที่จะเอาไปเช็คว่าชื่อตรงกับโปรเจคไหม
			// inputDelWBS.val() //ค่าที่จะเอาไปเช็คว่าwbsตรงกับโปรเจคไหม
			// ถ้าตรงก็ทำการลบ
			if(inputDelName.val() === $('.show-title-Proj-name').text() && inputDelWBS.val() === $('.show-title-Proj-WBS').text()) {
				$.get('./delete_project.php?ProjWBS='+inputDelWBS.val(), function(data) {
					console.log(data);
					window.location = "./categorize.php";
				});
			}
		});


		/*
			เลือกว่าจะดูอันไหน
		*/
		var buttonInv = $('.show-btn-inv');
		var buttonRec = $('.show-btn-rec');
		var buttonOut = $('.show-btn-out');
		var divInv = $('.show-all-data-inv');
		var divRec = $('.show-all-history-rec');
		var divOut = $('.show-all-history-out');
		divRec.hide();
		divOut.hide();
		buttonInv.addClass('show-btn-active');
		divInv.show();
		function outall(){
			buttonInv.removeClass('show-btn-active');
			buttonRec.removeClass('show-btn-active');
			buttonOut.removeClass('show-btn-active');
			divInv.hide();
			divRec.hide();
			divOut.hide();
		}
		buttonInv.click(function(){
			outall();
			buttonInv.addClass('show-btn-active');
			divInv.show();
		});
		buttonRec.click(function(){
			outall();
			buttonRec.addClass('show-btn-active');
			divRec.show();
		});
		buttonOut.click(function(){
			outall();
			buttonOut.addClass('show-btn-active');
			divOut.show();
		});



		/*
			ส่วนของการเพิ่มไฟล์สินค้าคงคลัง
		*/
		var tableinv = $('.table-inv');
		document.getElementById('file-inv').onchange = function(){
			var file = this.files[0];
			var reader = new FileReader();
			reader.onload = function(progressEvent){
				var lines = this.result.split('\n');
				$.get('./clear_data.php?table=' + $('.show-title-Proj-WBS').text() + '__tb_inv', function() {
					var head = lines[0].split(",");
					var head_str = '(';
					for(var i = 0; i < head.length; i++) {
						head_str += head[i].replace(/"/g, '');
						if(i !== head.length - 1) {
							head_str += ',';
						}
					}
					for(var line = 1; line < lines.length; line++){
						if(lines[line].replace(' ', '').length === 0) {
							continue;
						}
						var data = lines[line].split(",");
						var data_str = '(';
						for(var i = 0; i < data.length; i++) {
							data_str += data[i].replace('$', '');
							if(i !== data.length - 1) {
								data_str += ',';
							}
						}
						// console.log('./insert_data.php?ProjWBS=' + $('.show-title-Proj-WBS').text() + '&table=tb_inv&head=' + head_str + '&data='+data_str);
						$.get('./insert_data.php?table=' + $('.show-title-Proj-WBS').text() + '__tb_inv&head=' + head_str + '&data='+data_str, function(data) {
							console.log(data);
						});
						// tableinv.append('<div class="row"><div class="cell">'+check[0]+'</div><div class="cell">'+check[1]+'</div><div class="cell">'+check[2]+'</div><div class="cell">'+check[3]+'</div><div class="cell">'+check[4]+'</div></div>');
					}

				});
			};
			reader.readAsText(file);
		};



		/*
			ส่วนของการเพิ่มไฟล์ประวัติการรับสินค้า
		*/
		var tablerec = $('.table-rec');
		document.getElementById('file-rec').onchange = function(){
			var file = this.files[0];
			var reader = new FileReader();
			reader.onload = function(progressEvent){
				var lines = this.result.split('\n');
				$.get('./clear_data.php?table=' + $('.show-title-Proj-WBS').text() + '__tb_rec', function() {
					var head = lines[0].split(",");
					var head_str = '(';
					for(var i = 0; i < head.length; i++) {
						head_str += head[i].replace(/"/g, '');
						if(i !== head.length - 1) {
							head_str += ',';
						}
					}
					for(var line = 1; line < lines.length; line++){
						if(lines[line].replace(' ', '').length === 0) {
							continue;
						}
						var data = lines[line].split(",");
						var data_str = '(';
						for(var i = 0; i < data.length; i++) {
							data_str += data[i].replace('$', '');
							if(i !== data.length - 1) {
								data_str += ',';
							}
						}
						// console.log('./insert_data.php?ProjWBS=' + $('.show-title-Proj-WBS').text() + '&table=tb_inv&head=' + head_str + '&data='+data_str);
						$.get('./insert_data.php?ProjWBS=' + $('.show-title-Proj-WBS').text() + '&table=tb_rec&head=' + head_str + '&data='+data_str, function(data) {
							console.log(data);
						});
						// tableinv.append('<div class="row"><div class="cell">'+check[0]+'</div><div class="cell">'+check[1]+'</div><div class="cell">'+check[2]+'</div><div class="cell">'+check[3]+'</div><div class="cell">'+check[4]+'</div></div>');
					}

				});
			};
			reader.readAsText(file);
		};



		/*
			ส่วนของการเพิ่มไฟล์ประวัติการเบิกสินค้า
		*/
		var tableout = $('.table-out');
		document.getElementById('file-out').onchange = function(){
			var file = this.files[0];
			var reader = new FileReader();
			reader.onload = function(progressEvent){
				var lines = this.result.split('\n');
				$.get('./clear_data.php?table=' + $('.show-title-Proj-WBS').text() + '__tb_out', function() {
					var head = lines[0].split(",");
					var head_str = '(';
					for(var i = 0; i < head.length; i++) {
						head_str += head[i].replace(/"/g, '');
						if(i !== head.length - 1) {
							head_str += ',';
						}
					}
					for(var line = 1; line < lines.length; line++){
						if(lines[line].replace(' ', '').length === 0) {
							continue;
						}
						var data = lines[line].split(",");
						var data_str = '(';
						for(var i = 0; i < data.length; i++) {
							data_str += data[i].replace('$', '');
							if(i !== data.length - 1) {
								data_str += ',';
							}
						}
						console.log('./insert_data.php?ProjWBS=' + $('.show-title-Proj-WBS').text() + '&table=tb_out&head=' + head_str + '&data='+data_str);
						$.get('./insert_data.php?ProjWBS=' + $('.show-title-Proj-WBS').text() + '&table=tb_out&head=' + head_str + '&data='+data_str, function(data) {
							console.log(data);
						});
						// tableinv.append('<div class="row"><div class="cell">'+check[0]+'</div><div class="cell">'+check[1]+'</div><div class="cell">'+check[2]+'</div><div class="cell">'+check[3]+'</div><div class="cell">'+check[4]+'</div></div>');
					}

				});
			};
			reader.readAsText(file);
		};
	</script>


</body>
</html>
