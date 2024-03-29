<!DOCTYPE html>
 <?php
     $has_page = true;
     include 'check_connection.php';
?>
<html style="min-height: 100%; position: relative;">
<head>
	<title></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body class="body-show" style="min-height: 100%;">



	<!-- ตรงนี้เพิ่มส่วนของปุ่มกด กลับไปหน้าหลักกับออกจากระบบ -->
	<div class="btn-show-cateAndLogout">
		<a href="./index.php"><button class="button-user">หน้าหลัก</button></a>
		<a href="./logout.php"><button class="button-user">ออกจากระบบ</button></a>
	</div>




	<div class="show-title-Proj">
		<!-- <p class="show-title-Proj-name">NAME</p>
		<p class="show-title-Proj-WBS">WBS</p> -->
		<?php
			echo '<p class="show-title-Proj-name">ชื่อโครงการ : <span>' . $_GET['ProjName'] .'</span></p>';
			echo '<p class="show-title-Proj-WBS">WBS No. : <span>' . $_GET['ProjWBS'] .'</span></p>';
		?>
	</div>
	<div class="show-mode">
		<button class="show-btn-inv">สินค้าคงคลัง</button>
		<button class="show-btn-rec">ประวัติการรับสินค้า</button>
		<button class="show-btn-out">ประวัติการเบิกสินค้า</button>
	</div>
	<div class="show-all-data-inv">
        <p style="margin-left: 40px;">
            Lastest update:
            <?php
            $sql = 'SELECT DATE_FORMAT(LastUpdate, "%d/%m/%Y %H:%i") AS Date FROM `' . $_GET['ProjWBS'] . '__tb_inv`';
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo $row['Date'];
            } else {
                echo '-';
            }
            ?>
        </p>
		<div class="input-search-inv">
			รหัสสินค้า : <input type="input" name="locate" class="input-search-inv-no">
			ชื่อสินค้า : <input type="input" name="locate" class="input-search-inv-name">
           <?php
             if($_SESSION['admin'] == 1) {
          		echo '<input type="file" name="file" id="file-inv" style="display: inline-block; float: right;" disabled>';
                echo '<div style="display: inline-block; float:right;"">รหัสโครงการ : <input id="check-inv" type="text" style="display: inline-block;"></div>';
             }
          ?>
		</div>
		<div class="wrapper">
			<div class="table-inv tb_inv">
				<div class="row header blue">
					<div class="cell">รหัสสินค้า</div>
					<div class="cell">ชื่อสินค้า</div>
					<div class="cell">จำนวน</div>
					<div class="cell">หน่วย</div>
					<div class="cell">ราคาต่อหน่วย</div>
					<div class="cell">ราคารวม</div>
					<div class="cell">ที่เก็บสินค้า</div>
	    		</div>
				<?php
                    $col_types = array();
                    $q = $conn->query('DESCRIBE `' . $_GET['ProjWBS'] . '__tb_inv`');
                    while($row = $q->fetch_assoc()) {
                        array_push($col_types, $row['Type']);
                    }
					$sql = 'SELECT * FROM `' . $_GET['ProjWBS'] . '__tb_inv` ORDER BY InvNo';
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
						while($row = $result->fetch_assoc()) {
							echo '<div class="row content">';
                            $i = 0;
							foreach($row as $key => $val) {
								if($key == 'ID' || $key == 'LastUpdate') {
                                    $i++;
									continue;
								}
                                if(strpos($col_types[$i], 'float') !== false) {
                                    $val = number_format($val, 2);
                                }
								echo '<div class="cell">' . $val . '</div>';
                                $i++;
							}
							echo '</div>';
						}
					} else {
						echo 'no result.';
					}
				?>
			</div>
		</div>
	</div>

	<div class="show-all-history-rec">
        <p style="margin-left: 40px;">
            Lastest update:
            <?php
            $sql = 'SELECT DATE_FORMAT(LastUpdate, "%d/%m/%Y %H:%i") AS Date FROM `' . $_GET['ProjWBS'] . '__tb_rec`';
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo $row['Date'];
            } else {
                echo '-';
            }
            ?>
        </p>
		<div class="input-search-history-rec">
			วันที่ : <input type="date" name="locate" class="input-search-history-rec-date">
			รหัสสินค้า : <input type="input" name="locate" class="input-search-history-rec-no">
			ชื่อสินค้า : <input type="input" name="locate" class="input-search-history-rec-name">
           <?php
             if($_SESSION['admin'] == 1) {
          		echo '<input type="file" name="file" id="file-rec" style="display: inline-block; float:right;" disabled>';
                echo '<div style="display: inline-block; float:right;"">รหัสโครงการ : <input id="check-rec" type="text" style="display: inline-block;"></div>';
             }
          ?>
		</div>
		<div class="wrapper">
			<div class="table-rec tb_rec">
				<div class="row header blue">
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
                     $col_types = array();
                     $q = $conn->query('DESCRIBE `' . $_GET['ProjWBS'] . '__tb_rec`');
                     while($row = $q->fetch_assoc()) {
                         array_push($col_types, $row['Type']);
                     }
					$sql = 'SELECT * FROM `' . $_GET['ProjWBS'] . '__tb_rec` ORDER BY RecDate';
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
						while($row = $result->fetch_assoc()) {
							echo '<div class="row content">';
                            $i = 0;
							foreach($row as $key => $val) {
                                if($key == 'ID' || $key == 'LastUpdate') {
                                    $i++;
									continue;
								}
                                if(strpos($col_types[$i], 'float') !== false) {
                                    $val = number_format($val, 2);
                                }
								echo '<div class="cell">' . $val . '</div>';
                                $i++;
							}
							echo '</div>';
						}
					} else {
						echo 'no result.';
					}
				?>
			</div>
		</div>
	</div>

	<div class="show-all-history-out">
        <p style="margin-left: 40px;">
            Lastest update:
            <?php
            $sql = 'SELECT DATE_FORMAT(LastUpdate, "%d/%m/%Y %H:%i") AS Date FROM `' . $_GET['ProjWBS'] . '__tb_out`';
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo $row['Date'];
            } else {
                echo '-';
            }
            ?>
        </p>
		<div class="input-search-history-out">
			วันที่ : <input type="date" name="locate" class="input-search-history-out-date">
			รหัสสินค้า : <input type="input" name="locate" class="input-search-history-out-no">
			ชื่อสินค้า : <input type="input" name="locate" class="input-search-history-out-name">
            <?php
               if($_SESSION['admin'] == 1) {
                  echo '<input type="file" name="file" id="file-out" style="display: inline-block; float: right;" disabled>';
                  echo '<div style="display: inline-block; float:right;"">รหัสโครงการ : <input id="check-out" type="text" style="display: inline-block;"></div>';
               }
            ?>
		</div>
		<div class="wrapper">
			<div class="table-out tb_out">
				<div class="row header blue">
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
                     $col_types = array();
                     $q = $conn->query('DESCRIBE `' . $_GET['ProjWBS'] . '__tb_out`');
                     while($row = $q->fetch_assoc()) {
                         array_push($col_types, $row['Type']);
                     }
					$sql = 'SELECT * FROM `' . $_GET['ProjWBS'] . '__tb_out` ORDER BY OutDate';
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
						while($row = $result->fetch_assoc()) {
							echo '<div class="row content">';
                            $i = 0;
							foreach($row as $key => $val) {
                                if($key == 'ID' || $key == 'LastUpdate') {
                                    $i++;
									continue;
								}
                                if(strpos($col_types[$i], 'float') !== false) {
                                    $val = number_format($val, 2);
                                }
								echo '<div class="cell">' . $val . '</div>';
                                $i++;
							}
							echo '</div>';
						}
					} else {
						echo 'no result.';
					}
				?>
			</div>
		</div>
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

        // ค้นหา
        function tableSearch(tableName, q) {
            // console.log(JSON.stringify(q));
            $('div.'+tableName).find('div.row.content').html('');
            console.log('./project_info.php?ProjWBS=' + $('.show-title-Proj-WBS span').text() + '&table=' + tableName + '&q=' + JSON.stringify(q));
            $.get('./project_info.php?ProjWBS=' + $('.show-title-Proj-WBS span').text() + '&table=' + tableName + '&q=' + JSON.stringify(q), function(data) {
                // console.log(data);
                var json = JSON.parse(data);
                for(var i = 0; i < json.length; i++) {
                    var row = '<div class="row content">';
                    for(var j = 0; j < json[i].length; j++) {
                        row += '<div class="cell">'+json[i][j]+'</div>';
                    }
                    row += '</div>';
                    $('div.'+tableName).append(row);
                }
            });
        }

        searchInvNo.on('keyup', function() {
            tableSearch('tb_inv', [searchInvNo.val(), searchInvName.val()]);
        });

        searchInvName.on('keyup', function() {
            tableSearch('tb_inv', [searchInvNo.val(), searchInvName.val()]);
        });

        searchHisRecDate.change(function() {
            tableSearch('tb_rec', [searchHisRecDate.val(), searchHisRecNo.val(), searchHisRecName.val()]);
        });

        searchHisRecNo.on('keyup', function() {
            tableSearch('tb_rec', [searchHisRecDate.val(), searchHisRecNo.val(), searchHisRecName.val()]);
        });

        searchHisRecName.on('keyup', function() {
            tableSearch('tb_rec', [searchHisRecDate.val(), searchHisRecNo.val(), searchHisRecName.val()]);
        });

        searchHisOutDate.change(function() {
            tableSearch('tb_out', [searchHisOutDate.val(), searchHisOutNo.val(), searchHisOutName.val()]);
        });

        searchHisOutNo.on('keyup', function() {
            tableSearch('tb_out', [searchHisOutDate.val(), searchHisOutNo.val(), searchHisOutName.val()]);
        });

        searchHisOutName.on('keyup', function() {
            tableSearch('tb_out', [searchHisOutDate.val(), searchHisOutNo.val(), searchHisOutName.val()]);
        });



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
			if(inputDelName.val() === $('.show-title-Proj-name span').text() && inputDelWBS.val() === $('.show-title-Proj-WBS span').text()) {
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

            window.onbeforeunload = function() {
                return "";
            }
            $('div.backdrop').css('display', 'block');
            $('dialog#wait').css('display', 'block');
			var file = this.files[0];
			var reader = new FileReader();
			reader.onload = function(progressEvent){
				var lines = this.result.split('\n');
				$.get('./clear_data.php?table=' + $('.show-title-Proj-WBS span').text() + '__tb_inv', function() {
					var head = lines[0].split(",");
					var head_str = '(';
					for(var i = 0; i < head.length; i++) {
						head_str += head[i].replace(/"/g, '');
						if(i !== head.length - 1) {
							head_str += ',';
						}
					}
                    var total = 0;
                    var finish = 0;
					for(var line = 1; line < lines.length && continue_query; line++){
						if(lines[line].replace(' ', '').length === 0) {
							continue;
						}
                        total++;
						var data = lines[line].split(",");
						var data_str = '(';
						for(var i = 0; i < data.length; i++) {
							data_str += data[i].replace('$', '');
							if(i !== data.length - 1) {
								data_str += ',';
							}
						}
						// console.log('./insert_data.php?ProjWBS=' + $('.show-title-Proj-WBS span').text() + '&table=tb_inv&head=' + head_str + '&data='+data_str);
						$.get('./insert_data.php?table=' + $('.show-title-Proj-WBS span').text() + '__tb_inv&head=' + head_str + '&data='+data_str, function(data) {
							// console.log(data);
                            if(!continue_query) {
                                return;
                            }
                            if(data !== 'success') {
                                alert('Wrong file format.');
                                continue_query = false;
                                $('div.backdrop').css('display', 'none');
                                $('dialog#wait').css('display', 'none');
                                window.onbeforeunload = 0;
                                location.reload();
                                return;
                            }
                            finish++;
                            $('dialog#wait p#progress').text(String(Math.round(finish/total*100)) + "%");
                            if(finish === total) {
                                window.onbeforeunload = 0;
                                location.reload();
                            }
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
            window.onbeforeunload = function() {
                return "";
            }
            $('div.backdrop').css('display', 'block');
            $('dialog#wait').css('display', 'block');
			var file = this.files[0];
			var reader = new FileReader();
			reader.onload = function(progressEvent){
				var lines = this.result.split('\n');
				$.get('./clear_data.php?table=' + $('.show-title-Proj-WBS span').text() + '__tb_rec', function() {
					var head = lines[0].split(",");
					var head_str = '(';
					for(var i = 0; i < head.length; i++) {
						head_str += head[i].replace(/"/g, '');
						if(i !== head.length - 1) {
							head_str += ',';
						}
					}
                    var total = 0;
                    var finish = 0;
					for(var line = 1; line < lines.length && continue_query; line++){
						if(lines[line].replace(' ', '').length === 0) {
							continue;
						}
                        total++;
						var data = lines[line].split(",");
						var data_str = '(';
						for(var i = 0; i < data.length; i++) {
							data_str += data[i].replace('$', '');
							if(i !== data.length - 1) {
								data_str += ',';
							}
						}
						// console.log('./insert_data.php?ProjWBS=' + $('.show-title-Proj-WBS span').text() + '&table=tb_inv&head=' + head_str + '&data='+data_str);
						$.get('./insert_data.php?table=' + $('.show-title-Proj-WBS span').text() + '__tb_rec&head=' + head_str + '&data='+data_str, function(data) {
							// console.log(data);
                            if(!continue_query) {
                                return;
                            }
                            if(data !== 'success') {
                                alert('Wrong file format.');
                                continue_query = false;
                                $('div.backdrop').css('display', 'none');
                                $('dialog#wait').css('display', 'none');
                                window.onbeforeunload = 0;
                                location.reload();
                                return;
                            }
                            finish++;
                            $('dialog#wait p#progress').text(String(Math.round(finish/total*100)) + "%");
                            if(finish === total) {
                                window.onbeforeunload = 0;
                                location.reload();
                            }
						});
						// tableinv.append('<div class="row"><div class="cell">'+check[0]+'</div><div class="cell">'+check[1]+'</div><div class="cell">'+check[2]+'</div><div class="cell">'+check[3]+'</div><div class="cell">'+check[4]+'</div></div>');
					}

				});
			};
			reader.readAsText(file);
		};

        // เช็คอัพไฟล์
        var checkInv = $('input#check-inv');
        var checkRec = $('input#check-rec');
        var checkOut = $('input#check-out');
        checkInv.on('keyup', function() {
            var val = $(this).val();
            if(val === $('.show-title-Proj-WBS span').text()) {
                $('input#file-inv').prop('disabled', false);
            } else {
                $('input#file-inv').prop('disabled', true);
            }
        });
        checkRec.on('keyup', function() {
            var val = $(this).val();
            if(val === $('.show-title-Proj-WBS span').text()) {
                $('input#file-rec').prop('disabled', false);
            } else {
                $('input#file-rec').prop('disabled', true);
            }
        });
        checkOut.on('keyup', function() {
            var val = $(this).val();
            if(val === $('.show-title-Proj-WBS span').text()) {
                $('input#file-out').prop('disabled', false);
            } else {
                $('input#file-out').prop('disabled', true);
            }
        });


		/*
			ส่วนของการเพิ่มไฟล์ประวัติการเบิกสินค้า
		*/
        var continue_query = true;
		var tableout = $('.table-out');
		document.getElementById('file-out').onchange = function(){
            window.onbeforeunload = function() {
                return "";
            }
            $('div.backdrop').css('display', 'block');
            $('dialog#wait').css('display', 'block');
			var file = this.files[0];
			var reader = new FileReader();
			reader.onload = function(progressEvent){
				var lines = this.result.split('\n');
				$.get('./clear_data.php?table=' + $('.show-title-Proj-WBS span').text() + '__tb_out', function() {
					var head = lines[0].split(",");
					var head_str = '(';
					for(var i = 0; i < head.length; i++) {
						head_str += head[i].replace(/"/g, '');
						if(i !== head.length - 1) {
							head_str += ',';
						}
					}
                    var total = 0;
                    var finish = 0;
					for(var line = 1; line < lines.length && continue_query; line++){
						if(lines[line].replace(' ', '').length === 0) {
							continue;
						}
                        total++;
						var data = lines[line].split(",");
						var data_str = '(';
						for(var i = 0; i < data.length; i++) {
							data_str += data[i].replace('$', '');
							if(i !== data.length - 1) {
								data_str += ',';
							}
						}
						// console.log('./insert_data.php?ProjWBS=' + $('.show-title-Proj-WBS span').text() + '&table=tb_out&head=' + head_str + '&data='+data_str);
						$.get('./insert_data.php?table=' + $('.show-title-Proj-WBS span').text() + '__tb_out&head=' + head_str + '&data='+data_str, function(data) {
							// console.log(data);
                            if(!continue_query) {
                                return;
                            }
                            if(data !== 'success') {
                                alert('Wrong file format.');
                                continue_query = false;
                                $('div.backdrop').css('display', 'none');
                                $('dialog#wait').css('display', 'none');
                                window.onbeforeunload = 0;
                                location.reload();
                                return;
                            }
                            finish++;
                            $('dialog#wait p#progress').text(String(Math.round(finish/total*100)) + "%");
                            if(finish === total) {
                                window.onbeforeunload = 0;
                                location.reload();
                            }
						});
						// tableinv.append('<div class="row"><div class="cell">'+check[0]+'</div><div class="cell">'+check[1]+'</div><div class="cell">'+check[2]+'</div><div class="cell">'+check[3]+'</div><div class="cell">'+check[4]+'</div></div>');
					}

				});
			};
			reader.readAsText(file);
		};
	</script>
    <dialog id="wait" style="z-index: 100; display: none; position: absolute; top: 250px; font-size: 30px; border: 0px; border-radius: 10px; box-shadow: 0px 0px 20px black;">
        <p>Please wait</p>
        <p id="progress" style="text-align: center;"></p>
    </dialog>
    <div class="backdrop" style="z-index: 99; display: none; background-color: rgba(0, 0, 0, 0.1); position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;">
    </div>

</body>
</html>
