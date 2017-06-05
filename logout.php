<?php
   session_start();
   session_unset();
   session_destroy();
   if(!isset($_GET['session_expired'])) {
       header("Location: .");
   } else if($_GET['session_expired'] == '1') {
       header("Location: ./?session_expired=1");
   }
?>
