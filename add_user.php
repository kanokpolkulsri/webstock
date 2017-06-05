<?php
    $has_page = false;
    include 'check_connection.php';
   $sql = 'CREATE USER "' . $_POST['username'] . '"@"localhost" IDENTIFIED BY "' . $_POST['password'] . '"';
   $sql = 'INSERT INTO users (Username,Password,Name,Phone,Company,Position,State,LastUpdate) VALUES ("' . $_POST['username'] . '","' . hash('sha512', $_POST['password']) . '","' . $_POST['name'] . '","' . $_POST['phone'] . '","' . $_POST['company'] . '","' . $_POST['position'] . '","' . $_POST['state'] . '",' . 'NOW())';
   // echo $sql;
   if($conn->query($sql)) {
      echo 'success';
   } else {
      echo $conn->error;
   }
?>
