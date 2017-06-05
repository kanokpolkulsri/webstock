<?php
    $has_page = false;
    include 'check_connection.php';
   $sql = 'INSERT INTO ' . $_GET['table'] . ' ' . $_GET['head'] . ', LastUpdate)' . ' VALUES ' . $_GET['data'] . ',NOW())';
   // echo $sql;
   if($conn->query($sql) === TRUE) {
      echo 'success';
   } else {
      echo $conn->error;
   }
?>
