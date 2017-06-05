<?php
    $has_page = false;
    include 'check_connection.php';
   $sql = 'DELETE FROM project_map WHERE ProjWBS = '. $_GET['ProjWBS'];
   $result1 = $conn->query($sql);
   $sql = 'DROP TABLE '. $_GET['ProjWBS'] . '__tb_inv';
   $result2 = $conn->query($sql);
   $sql = 'DROP TABLE '. $_GET['ProjWBS'] . '__tb_rec';
   $result3 = $conn->query($sql);
   $sql = 'DROP TABLE '. $_GET['ProjWBS'] . '__tb_out';
   $result4 = $conn->query($sql);
   if ($result1 && $result2 && $result3 && $result4) {
      echo "success";
   }
?>
