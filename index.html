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
    <div class="header-logo"><img src="./logo.jpg" class="logo"/></div><br>
      <p class="login-title">Welcome to Thaimeidensha Co., Ltd.</p>
      <p class="login-title-blue">Thaimeidensha Stock System</p>
      <div class="test">
        <div class="login">
           <form class="" action="./login.php" method="post">
            <ul class='login'>
              <p>Please Login</p  >
              <li><input type='text' name='username' class="login-usr" id="login-usr"></li>
              <li><input type='password' name='password' class="login-pass" id="login-pass"></li>
              <br><input type="submit" value="Login" class="btn-submit"/>
            </ul>

            <!-- <br><input type="submit" value="SIGN IN" class="btn-submit"/> -->
            <?php
               if(isset($_GET['login_failed']) && $_GET['login_failed'] == 1) {
                  echo '<p class="login-fail">Wrong username or password.</p>';
              } else if(isset($_GET['session_expired']) && $_GET['session_expired'] == 1) {
                  echo '<p class="login-fail">Session expired.</p>';
              }
            ?>
            </form>
        </div>
      </div>

      <script type="text/javascript">
      document.getElementById("login-usr").placeholder = "username";
      document.getElementById("login-pass").placeholder = "password";
      </script>

    </body>
</html>
