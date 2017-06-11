<!DOCTYPE html>
<?php
   session_start();
   error_reporting(E_ERROR | E_PARSE);
   date_default_timezone_set("Asia/Bangkok");

   if(isset($_SESSION['username'])) {
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', $_SESSION['db_username']);
      define('DB_PASSWORD', $_SESSION['db_password']);
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
      <p class="login-title">WELCOME, TMDSEO4</p>
        <div class="login">
           <form class="" action="./login.php" method="post">
            <ul class='login'>
                    <li>Username <input type='text' name='username' class="login-usr"></li>
                    <li>Password  <input type='password' name='password' class="login-pass"></li>
            </ul>
            <br><input type="submit" value="SIGN IN" class="btn-submit"/>
            <?php
               if(isset($_GET['login_failed']) && $_GET['login_failed'] == 1) {
                  echo '<br><p class="login-fail">Wrong username or password.</p>';
              } else if(isset($_GET['session_expired']) && $_GET['session_expired'] == 1) {
                  echo '<br><p class="login-fail">Session expired.</p>';
              }
            ?>
            </form>
        </div>
    </body>
</html>
