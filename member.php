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
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body>
	<div class="add-user">
		<button class="button-show-add-user">+</button> เพิ่มสมาชิก <br>
		<div class="add-user-input">
			<ul class="all-row-user">
				<li class="row-user">Username : <input type="input" name="locate" class="input-regis-username"></li>
				<li class="row-user">Password : <input type="input" name="locate" class="input-regis-pass1"></li>
				<li class="row-user">Confirm Password : <input type="input" name="locate" class="input-regis-pass2"></li>
				<li class="row-user">Name : <input type="input" name="locate" class="input-regis-name"></li>
				<li class="row-user">Phone : <input type="input" name="locate" class="input-regis-phone"></li>
				<li class="row-user">Company : <input type="input" name="locate" class="input-regis-company"></li>
				<li class="row-user">Position : <input type="input" name="locate" class="input-regis-position"></li>
				<li class="row-user"><button class="input-regis-select-admin"></button> admin</li>
				<li class="row-user"><button class="input-regis-select-user"></button> user</li>
				<br>
				<button class="button-add-user">เพิ่มสมาชิก</button>
			</ul>
		</div>
	</div>

	<div class="member-data">
		<button class="button-show-member-data">+</button> ข้อมูลสมาชิก <br>
		<div class="member-show-all-data">
			<div class="wrapper">
				<div class="table-user">
					<div class="row header blue">
						<div class="cell">Username</div>
						<div class="cell">Name</div>
						<div class="cell">Phone</div>
						<div class="cell">Company</div>
						<div class="cell">Position</div>
						<div class="cell">State</div>
		    		</div>
               <?php
                  $sql = 'SELECT * FROM users';
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                  // output data of each row
                     while($row = $result->fetch_assoc()) {
                        echo '<div class="row">';
                        foreach($row as $key => $val) {
                           if($key == 'LastUpdate') {
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
				<!-- เอาดาต้ามาใส่ตรงนี้ -->
			</div>
		</div>
	</div>

	<div class="member-delete-user">
		<button class="button-show-delete-user">+</button> ลบสมาชิก <br>
		<div class="del-user-input">
			<ul class="del-all-row-user">
				<li class="row-user">Username : <input type="input" name="locate" class="input-del-username"></li>
				<li class="row-user">Name : <input type="input" name="locate" class="input-del-name"></li>
				<li class="row-user">Company : <input type="input" name="locate" class="input-del-company"></li>
				<br>
				<button class="button-del-user">ลบสมาชิก</button>
			</ul>
		</div>
	</div>

	<script type="text/javascript">
	/*ส่วนตรงลบสมาชิก*/
	//ถ้าusernameอะไรมันเหมือนกันก็ลบ
	var delUserInput = $('.del-user-input');
	var buttonShowDeleteUser = $('.button-show-delete-user');
	var checkShowDeleteUser = false;
	delUserInput.hide();
	buttonShowDeleteUser.click(function(){ //เปิดปิดเฉยๆ
		if(!checkShowDeleteUser){
			checkShowDeleteUser = true;
			delUserInput.show();
		}else{
			checkShowDeleteUser = false;
			delUserInput.hide();
		}
	});
	var delUsername = $('.input-del-username');
	var delName = $('.input-del-name');
	var delCompany = $('.input-del-company');
	var buttonDeleteUser = $('.button-del-user');
	buttonDeleteUser.click(function(){
		//ถ้ากดปุ่มนี้ก็เอาค่า delUsername.val() , delName.val() , delCompany.val()
      $.post('./delete_user.php', {username: delUsername.val(), name: delName.val(), company: delCompany.val()}, function(data) {
         if(data !== 'success') {
            alert(data);
         } else {
            location.reload();
         }
      });
	});



	/*เอาข้อมูลมาประกาศไว้*/
		var memberShowAllData = $('.member-show-all-data');
		var buttonMemberShowAllData = $('.button-show-member-data');
		var checkMemberShowAllData = false;
		memberShowAllData.hide();
		buttonMemberShowAllData.click(function(){
			if(!checkMemberShowAllData){
				checkMemberShowAllData = true;
				memberShowAllData.show();
			}else{
				checkMemberShowAllData = false;
				memberShowAllData.hide();
			}
		});
		var useradd = $('.table-user');
		//ตรงนี้ก็เขียนฟังก์ชั่นอ่านค่าจาก database มาใส่ใน useradd
		//useradd.append("<div class="row">  <div class="cell">username</div>   <div class="cell">name</div>  <div class="cell">phone</div>  <div class="cell">company</div>  <div class="cell">position</div>  <div class="cell">state</div></div>);


	/*เพิ่มใหม่ตรง เพิ่มสมาชิก*/
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
		var buttonSelectAdmin = $('.input-regis-select-admin');
		var buttonSelectUser = $('.input-regis-select-user');
		var checkSelectAdmin = true;
		buttonSelectAdmin.click(function(){
			checkSelectAdmin = true;
			buttonSelectAdmin.addClass('member-btn-active');
			buttonSelectUser.removeClass('member-btn-active');
		});
		buttonSelectUser.click(function(){
			checkSelectAdmin = false;;
			buttonSelectUser.addClass('member-btn-active');
			buttonSelectAdmin.removeClass('member-btn-active');
		});
		buttonAddUser.click(function(){
			//ก็เอาค่าจาก regis.. ไปใส่ได้เลย
         if(regisPass1.val() !== regisPass2.val()) {
            alert('Passwords do not match.')
            return;
         }
         $.post('./add_user.php', {username: regisUsername.val(), password: regisPass1.val(), admin: (checkSelectAdmin ? 1 : 0)}, function(data) {
            if(data !== 'success') {
               alert(data);
            } else {
               $.post('./user_info.php', {username: regisUsername.val(), name: regisName.val(),
                  phone: regisPhone.val(), company: regisCompany.val(), position: regisPosition.val(), state: (checkSelectAdmin ? 'admin' : 'user')}, function(data) {
                     if(data !== 'success') {
                        alert(data);
                     }
                     location.reload();
                  });
            }
         });
		});
	</script>


</body>
</html>
