<!DOCTYPE html>
<?php
   session_start();
   session_unset();
   session_destroy();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="s.css">
    </head>
    <body class="login">
        <div class="login">
           <form class="" action="./categorize.php" method="post">
           <p class="login-title">WELCOME, TMDSEO4</p>
            <ul class='login'>
                    <li>Username <input type='text' name='username' class="login-usr"></li>
                    <li>Password  <input type='password' name='password' class="login-pass"></li>
            </ul>
            <br><input type="submit" value="SIGN IN" class="btn-submit"/>
            <!-- <?php
               if(isset($_GET['login_failed']) && $_GET['login_failed'] == 1) {
                  echo '<p style="color: red;">Wrong username or password.</p>';
               }
            ?> -->
            </form>
        </div>
    </body>
</html>
