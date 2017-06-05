<?php
    $has_page = false;
    include 'check_connection.php';
   $sql = 'DELETE FROM users WHERE Username = "' . $_POST['username'] . '" AND Name = "' . $_POST['name'] . '" AND Company = "' . $_POST['company'] . '"';
   if($conn->query($sql)) {
       echo "success";
   } else {
       echo $conn->error;
   }
?>
