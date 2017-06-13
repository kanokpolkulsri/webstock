<?php
    $has_page = false;
    include 'check_connection.php';
   $sql = 'DELETE FROM `' . $_GET['table'] . '`';
   if($conn->query($sql) === TRUE) {
      echo 'success';
   } else {
      echo $conn->error;
   }
?>
