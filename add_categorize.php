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
   $sql = "INSERT INTO project_map (ProjWBS, ProjName, LastUpdate) VALUES ('" . $_GET['ProjWBS'] . '\',\'' . $_GET['ProjName'] . '\',NOW())';
   $conn->query($sql);

   $sql = "CREATE TABLE " . $_GET['ProjWBS'] . "__tb_inv (
      ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      InvNo VARCHAR(50) NOT NULL,
      InvName VARCHAR(1000) NOT NULL,
      InvAmount INT UNSIGNED NOT NULL,
      InvUnit VARCHAR(100) NOT NULL,
      InvPriceUnit FLOAT(20, 10) NOT NULL,
      InvPriceTotal FLOAT(40, 10) NOT NULL,
      InvStorage VARCHAR(400) NOT NULL,
      LastUpdate DATETIME NOT NULL
   ) CHARSET=utf8";
   if ($conn->query($sql) === FALSE) {
      echo $conn->error;
      die();
   }
   $sql = "CREATE TABLE " . $_GET['ProjWBS'] . "__tb_out (
      ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      OutDate DATE NOT NULL,
      OutNo CHAR(8) NOT NULL,
      OutName VARCHAR(200) NOT NULL,
      OutAmount INT NOT NULL,
      OutUnit VARCHAR(100) NOT NULL,
      OutPriceUnit FLOAT(20, 10) NOT NULL,
      OutPriceTotal FLOAT(40, 10) NOT NULL,
      OutPerson VARCHAR(200) NOT NULL,
      OutComp  VARCHAR(200) NOT NULL,
      OutAdmin VARCHAR(200) NOT NULL,
      OutStorage  VARCHAR(400) NOT NULL,
      LastUpdate DATETIME NOT NULL
   ) CHARSET=utf8";
   if ($conn->query($sql) === FALSE) {
      echo $conn->error;
      die();
   }
   $sql = "CREATE TABLE " . $_GET['ProjWBS'] . "__tb_rec (
      ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      RecDate DATE NOT NULL,
      RecNo CHAR(8) NOT NULL,
      RecName VARCHAR(200) NOT NULL,
      RecAmount INT NOT NULL,
      RecUnit VARCHAR(100) NOT NULL,
      RecPriceUnit FLOAT(20, 10) NOT NULL,
      RecPriceTotal FLOAT(40, 10) NOT NULL,
      RecPerson VARCHAR(200) NOT NULL,
      RecComp  VARCHAR(200) NOT NULL,
      RecStorage  VARCHAR(400) NOT NULL,
      LastUpdate DATETIME NOT NULL
   ) CHARSET=utf8";
   if ($conn->query($sql) === FALSE) {
      echo $conn->error;
      die();
   }
   echo 'success';
?>
