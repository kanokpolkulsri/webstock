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
	<div class="btn-cate-userAndLogout">
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
	</div>

	<script type="text/javascript">
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
