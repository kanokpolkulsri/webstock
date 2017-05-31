<!DOCTYPE html>
<?php
   session_start();
   error_reporting(E_ERROR | E_PARSE);
   date_default_timezone_set("Asia/Bangkok");

   if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', $_SESSION['username']);
      define('DB_PASSWORD', $_SESSION['password']);
      // define('DB_USERNAME', 'user1');
      // define('DB_PASSWORD', '1q2w3e4r');
      $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD);
      if($conn->connect_error) {
         header("Location: ./logout.php");
         die('connection error');
      } else {
         header("Location: ./categorize.php");
      }
   }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body class="login">
        <div class="login">
           <form class="" action="./login.php" method="post">
           <p class="login-title">WELCOME, TMDSEO4</p>
            <ul class='login'>
                    <li>Username <input type='text' name='username' class="login-usr"></li>
                    <li>Password  <input type='password' name='password' class="login-pass"></li>
            </ul>
            <br><input type="submit" value="SIGN IN" class="btn-submit"/>
            <?php
               if(isset($_GET['login_failed']) && $_GET['login_failed'] == 1) {
                  echo '<p class="login-fail">Wrong username or password.</p>';
               }
            ?>
            </form>
        </div>
    </body>
</html>
