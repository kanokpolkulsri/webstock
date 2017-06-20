<?php
    $has_page = false;
    include 'check_connection.php';
   $sql = 'DELETE FROM users WHERE Username = "' . $_POST['username'] . '" AND Username <> "admin" AND Name = "' . $_POST['name'] . '" AND Company = "' . $_POST['company'] . '"'
   . ' AND Phone = "' . $_POST['phone'] . '" AND Position = "' . $_POST['position'] . '" AND State = "' . $_POST['status'] . '"';
   if($conn->query($sql)) {
       if($conn->affected_rows == 0) {
           echo "nope";
       } else {
            echo "success";
       }
   } else {
       echo $conn->error;
   }
?>
