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
<body>


	<!-- ตรงนี้เพิ่มส่วนของปุ่มกด กลับไปหน้าหลักกับออกจากระบบ -->
	<div class="btn-member-cateAndLogout">
		<img src="./logo.jpg" class="logo"/>
		<a href="./index.php"><button class="button-user">หน้าหลัก</button></a>
		<a href="./logout.php"><button class="button-user">ออกจากระบบ</button></a>
	</div>



	<p class="header-member">USER Management</p>
	<div class="mode-member">
		<div class="button-mode-add">
			<button class="button-show-add-user">+</button> เพิ่มสมาชิก
		</div>
		<div class="button-mode-show">
			<button class="button-show-member-data">+</button> ข้อมูลสมาชิก
		</div>
		<div class="button-mode-delete">
			<button class="button-show-delete-user">+</button> ลบสมาชิก
		</div>
	</div>

	<div class="add-user">
		<div class="add-user-input" style="font-size: 14px">
		<p style="font-size: 16px"> เพิ่มสมาชิก </p>
			<ul class="all-row-user">
				<li class="row-user"><input type="input" id="add-username" class="row-user-input"/></li>
				<li class="row-user"><input type="password" id="add-password" class="row-user-input"/></li>
				<li class="row-user"><input type="password" id="add-password2" class="row-user-input"/></li>
				<li class="row-user"><input type="input" id="add-name" class="row-user-input"/></li>
				<li class="row-user"><input type="input" id="add-phone" class="row-user-input"/></li>
				<li class="row-user"><input type="input" id="add-company" class="row-user-input"/></li>
				<li class="row-user"><input type="input" id="add-position" class="row-user-input"/></li>
				<li class="row-user"><input type="radio" id="add-status-admin" class="input-regis-select-admin"/> admin</li>
				<li class="row-user"><input type="radio" id="add-status-user" class="input-regis-select-user"/> user</li>
				<button class="button-add-user" style="font-size: 16px;">เพิ่มสมาชิก</button>
			</ul>
		</div>
	</div>

	<div class="member-data">
		<div class="member-show-all-data">
		<p style="margin-left: 30px; margin-bottom: -20px; font-size: 16px;">ข้อมูลสมาชิก</p>
		<br>
		<div class="member-cell-user">
			<div class="cell-user">Username : <input id="member-search-username"/></div>
			<div class="cell-user">Name : <input id="member-search-name"/></div>
			<div class="cell-user">Phone : <input id="member-search-phone"/></div>
			<div class="cell-user">Company : <input id="member-search-company"/></div>
			<div class="cell-user">Position : <input id="member-search-position"/></div>
			<div class="cell-user">Status : <input id="member-search-status"/></div>
		</div>
			<div class="wrapper">
				<div class="table-user">
					<div class="row header blue">
						<div class="cell">Username</div>
						<div class="cell">Name</div>
						<div class="cell">Phone</div>
						<div class="cell">Company</div>
						<div class="cell">Position</div>
						<div class="cell">Status</div>
		    		</div>
               <?php
                  $sql = 'SELECT * FROM users';
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                  // output data of each row
                     while($row = $result->fetch_assoc()) {
                        echo '<div class="row">';
                        foreach($row as $key => $val) {
                           if($key == 'Password' || $key == 'LastUpdate') {
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
		</div>
	</div>

	<div class="member-delete-user">
		<div class="del-user-input">
			<p style="margin-left: 30px; font-size: 16px;"> ลบสมาชิก</p>
			<ul class="del-all-row-user">
				<li class="row-user"><input type="input" id="del-username" class="row-user-input"/></li>
				<li class="row-user"><input type="input" id="del-password" class="row-user-input"/></li>
				<li class="row-user"><input type="input" id="del-password2" class="row-user-input"/></li>
				<li class="row-user"><input type="input" id="del-name" class="row-user-input"/></li>
				<li class="row-user"><input type="input" id="del-phone" class="row-user-input"/></li>
				<li class="row-user"><input type="input" id="del-company" class="row-user-input"/></li>
				<li class="row-user"><input type="input" id="del-position" class="row-user-input"/></li>
				<li class="row-user"><input type="input" id="del-status" class="row-user-input"/></li>
				<button class="button-del-user" style="font-size: 16px;">ลบสมาชิก</button>
			</ul>
		</div>
	</div>

	<script type="text/javascript">
	/*สำหรับการค้นหาข้อมูลสมาชิก โชว์อัตโนมัติ โดยที่อิงข้อมูลจากตัวแปรต่อไปนี้*/
	document.getElementById("member-search-username").placeholder = "Username";
	document.getElementById("member-search-name").placeholder = "Name";
	document.getElementById("member-search-phone").placeholder = "Phone";
	document.getElementById("member-search-company").placeholder = "Company";
	document.getElementById("member-search-position").placeholder = "Position";
	document.getElementById("member-search-status").placeholder = "Status";
	var searchUsername = $('#member-search-username');
	var searchName = $('#member-search-name');
	var searchPhone = $('#member-search-phone');
	var searchCompany = $('#member-search-company');
	var searchPosition = $('#member-search-position');
	var searchStatus = $('#member-search-status');
		//ปาม //แล้วตรงนี้ก็เอาตัวแปร .val() ไปใช้









	/*ส่วนตรงลบสมาชิก*/

	var delUserInput = $('.del-user-input');
	var buttonShowDeleteUser = $('.button-mode-delete');
	var checkShowDeleteUser = false;
	delUserInput.hide();
	buttonShowDeleteUser.click(function(){ //เปิดปิดเฉยๆ
		if(!checkShowDeleteUser){
			checkShowDeleteUser = true;
			memberShowAllData.hide();
			allRowUser.hide();
			delUserInput.show();
		}else{
			checkMemberShowAllData = false;
			checkButtonAddUser = false;
			checkShowDeleteUser = false;
			delUserInput.hide();
		}
	});

	document.getElementById("del-username").placeholder = "Username";
	document.getElementById("del-password").placeholder = "Password";
	document.getElementById("del-password2").placeholder = "Confirm Password";
	document.getElementById("del-name").placeholder = "Name";
	document.getElementById("del-phone").placeholder = "Phone";
	document.getElementById("del-company").placeholder = "Company";
	document.getElementById("del-position").placeholder = "Position";
	document.getElementById("del-status").placeholder = "Admin / User";
	var delUsername = $('#del-username');
	var delPass1 = $('#del-password');
	var delPass2 = $('#del-password2');
	var delName = $('#del-name');
	var delPhone = $('#del-phone');
	var delCompany = $('#del-company');
	var delPosition = $('#del-position');
	var delStatus = $('#del-status');
	var buttonDeleteUser = $('.button-del-user');

	buttonDeleteUser.click(function(){
        if(delPass1.val() !== delPass2.val() || delUsername.val() === '' || delPass1.val() === '' || delStatus.val() === '') {
            alert('Data does not match.');
            return;
        }
      $.post('./delete_user.php', {username: delUsername.val(), password: delPass1.val(), name: delName.val(),
          phone: delPhone.val(), company: delCompany.val(), position: delPosition.val(), status: delStatus.val().toLowerCase()}, function(data) {
         if(data !== 'success') {
            alert('Data does not match.');
         } else {
             location.reload();
         }
      });
	});



	/*เอาข้อมูลมาประกาศไว้*/
		var memberShowAllData = $('.member-show-all-data');
		var buttonMemberShowAllData = $('.button-mode-show');
		var checkMemberShowAllData = false;
		memberShowAllData.hide();
		buttonMemberShowAllData.click(function(){
			if(!checkMemberShowAllData){
				checkMemberShowAllData = true;
				delUserInput.hide();
				allRowUser.hide();
				memberShowAllData.show();
			}else{
				checkMemberShowAllData = false;
				checkButtonAddUser = false;
				checkShowDeleteUser = false;
				memberShowAllData.hide();
			}
		});
		var useradd = $('.table-user');


	/*เพิ่มใหม่ตรง เพิ่มสมาชิก*/
		var buttonShowAddUser = $('.button-mode-add');
		var allRowUser = $('.add-user-input');
		var checkButtonAddUser = false;
		// allRowUser.hide();
		buttonShowAddUser.click(function(){
			if(!checkButtonAddUser){
				// buttonShowAddUser.addClass('cate-btn-active');
				checkButtonAddUser = true;
				memberShowAllData.hide();
				delUserInput.hide();
				allRowUser.show();
			}else{
				// buttonShowAddUser.removeClass('cate-btn-active');
				checkMemberShowAllData = false;
				checkButtonAddUser = false;
				checkShowDeleteUser = false;
				allRowUser.hide();
			}
		});

		/*ปามเพิ่มเอง*/
		document.getElementById("add-username").placeholder = "Username";
		document.getElementById("add-password").placeholder = "Password";
		document.getElementById("add-password2").placeholder = "Confirm Password";
		document.getElementById("add-name").placeholder = "Name";
		document.getElementById("add-phone").placeholder = "Phone";
		document.getElementById("add-company").placeholder = "Company";
		document.getElementById("add-position").placeholder = "Position";
		var regisUsername = $('#add-username');
		var regisPass1 = $('#add-password');
		var regisPass2 = $('#add-password2');
		var regisName = $('#add-name');
		var regisPhone = $('#add-phone');
		var regisCompany = $('#add-company');
		var regisPosition = $('#add-position');
		var buttonAddUser = $('.button-add-user');
		var buttonSelectAdmin = $('.input-regis-select-admin');
		var buttonSelectUser = $('.input-regis-select-user');
		buttonSelectAdmin.click(function(){
			document.getElementById("add-status-admin").checked = true;
			document.getElementById("add-status-user").checked = false;
		});
		buttonSelectUser.click(function(){
			document.getElementById("add-status-admin").checked = false;
			document.getElementById("add-status-user").checked = true;
		});
		buttonAddUser.click(function(){
         if(regisPass1.val() !== regisPass2.val()) {
            alert('Passwords do not match.')
            return;
         }
         $.post('./add_user.php', {username: regisUsername.val(), password: regisPass1.val(), name: regisName.val(),
                  phone: regisPhone.val(), company: regisCompany.val(), position: regisPosition.val(), state: (document.getElementById("add-status-admin").checked ? 'admin' : 'user')}, function(data) {
            if(data !== 'success') {
               alert(data);
            } else {
                location.reload();
            }
         });
		});
	</script>


</body>
</html>
