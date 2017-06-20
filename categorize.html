<!DOCTYPE html>
<?php
    $has_page = true;
    include 'check_connection.php';
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
<body class="body-categorize">
	<img src="./logo.jpg" class="logo"/><br>
	<p class="title-cate"> Welcome to Thaimeidensha Stock System</p>
	<div class="cate-content">

		<div class="cate-content-left">
			<div class="cate-data-all">
				<div class="add">
					<?php
						if($_SESSION['admin'] == 1) {
							echo '<u style="font-size: 16px;">ระบบเพิ่มโครงการ</u>
							<p>ชื่อโครงการ : <input type="input" class="input-value-name-add" /><br></p>
							<p>WBS NO. : <input type="input" class="input-value-wbs-add" /><br></p>
							<button class="button-add">เพิ่มโครงการ</button>
							';
						}
					?>
				</div>
				<?php
					if($_SESSION['admin'] == 1) {
						echo '<a href="./member.php"><button class="button-user">จัดการผู้ใช้</button></a>';
					}
				?>
				<br><a href="./logout.php"><button class="button-user">ออกจากระบบ</button></a>
			</div>
		</div>

		<div class="cate-content-right">
			<div class="cate-data-all">
				<div class="cate-data-search">
					<u style="font-size: 16px";>ค้นหา</u>&nbsp;&nbsp;&nbsp;&nbsp; ชื่อโครงการ : <input type="input" class="cate-data-search-name"/> &nbsp;&nbsp;&nbsp;&nbsp; WBS NO. : <input type="input" class="cate-data-search-wbs"/>&nbsp;&nbsp;&nbsp;&nbsp;<button class="cate-data-search-btn">ค้นหา</button>
				</div>
				<div class="location"></div>
			</div>
		</div>
	</div>

	<!-- <div class="btn-cate-userAndLogout">
		<?php
			if($_SESSION['admin'] == 1) {
				echo '<a href="./member.php"><button class="button-user">จัดการผู้ใช้</button></a>';
			}
		?>
		<a href="./logout.php"><button class="button-user">ออกจากระบบ</button></a>
	</div>
	<p class="title-cate"> WELCOME TMDSEO4</p>
	<div class="cate-data-all">
		<div class="add">
			<?php
				if($_SESSION['admin'] == 1) {
					echo 'ชื่อโครงการ : <input type="input" name="locate" class="input-value-name-add" style="margin-right: 20px;">
					WBS No. : <input type="input" name="locate" class="input-value-wbs-add" style="margin-right: 20px;">
					<button class="button-add">เพิ่มโครงการ</button>
					';
				}
			?>
		</div>
		<div class="location"></div>
	</div> -->

	<script type="text/javascript">
		/*
			ตรงนี้เพิ่มเติมมาของส่วนที่จะค้นหาชื่อ และเลข WBS 
		*/
		var buttonSearch = $('.cate-data-search-btn');
		var inputSearchName = $('.cate-data-search-name');
		var inputSearchWBS = $('.cate-data-search-wbs');
		buttonSearch.click(function(){

			//กดค้นหาตรงนี้

			inputSearchName.val('');
			inputSearchWBS.val('');

		});

		/* จบส่วนที่เพิ่มเติม */

		var buttonadd = $('.button-add');
		var inputname = $('.input-value-name-add');
		var inputwbs = $('.input-value-wbs-add');
		var locationadd = $('.location');
		var location_empty = locationadd.html();

		buttonadd.click(function(){
			if(inputwbs.val() === '' || inputname.val() === '') {
				return;
			}
			var link = './add_categorize.php';
			$.get(link + '?ProjWBS=' + inputwbs.val() + '&ProjName=' + inputname.val(), function(data) {
				if(data !== "success") {
					alert(data);
				}
				get_project();
			});

			inputname.val('');
			inputwbs.val('');
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
					locationadd.append('<a href="./show.php?ProjWBS=' + projects[i].ProjWBS + '&ProjName=' + projects[i].ProjName + '"><button class="btn-location">'+projects[i].ProjName + ' (' + projects[i].ProjWBS.substring('project_')+')</button></a>');
				}
			});
		}

		$(document).ready(function() {
			get_project();
		});
	</script>

</body>
</html>
