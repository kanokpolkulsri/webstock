<?php
    $has_page = false;
    include 'check_connection.php';
    $sql = 'SELECT * FROM users WHERE Username = "' . $_POST['username'] . '" AND Username <> "admin" AND Name = "' . $_POST['name'] . '" AND Company = "'
    . $_POST['company'] . '" AND Phone = "' . $_POST['phone'] . '" AND Position = "' . $_POST['position'] . '" AND State = "' . $_POST['status'] . '"';
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$password = $_POST['password'];
		$row = $result->fetch_assoc();
		if(hash_equals($row['Password'], crypt($password, $row['Password']))) {
           $sql = 'DELETE FROM users WHERE Username = "' . $_POST['username'] . '"';
           if($conn->query($sql)) {
                echo "success";
           } else {
               echo $conn->error;
           }
		}
	} else {
        echo "nope";
    }
?>
