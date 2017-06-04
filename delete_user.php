<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    date_default_timezone_set("Asia/Bangkok");
    if(isset($_SESSION['username'])) {
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', $_SESSION['db_username']);
        define('DB_PASSWORD', $_SESSION['db_password']);
        // define('DB_USERNAME', 'user1');
        // define('DB_PASSWORD', '1q2w3e4r');
        define('DB_DATABASE', 'projects');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
        if($conn->connect_error) {
            header("Location: .");
            die('connection error');
        }
        mysqli_set_charset($conn, "utf8");
    } else {
        die();
    }
   $error = '';
   $sql = 'SELECT Username FROM users WHERE Username = "' . $_POST['username'] . '" AND Name = "' . $_POST['name'] . '" AND Company = "' . $_POST['company'] . '"';
   $result = $conn->query($sql);
   if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $username = $row['Username'];
      $sql = 'DELETE FROM users WHERE Username = "' . $username . '"';
      $result = $conn->query($sql);
      if($result === TRUE) {
         $sql = 'DROP USER "' . $username . '"@"localhost"';
         $result = $conn->query($sql);
         if($result === TRUE) {
            echo 'success';
         } else {
            echo $conn->error;
         }
      } else {
         echo $conn->error;
      }
   }
?>
