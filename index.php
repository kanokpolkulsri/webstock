<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body class="login">
        <div class="login">
           <form class="" action="./categorize.php" method="post">
           <div class="pic-test">
            <img src="logo.jpg" class="logo"/>
           </div>
            <ul class='login'>
                    <li>Username <input type='text' name='username' class="login-usr"></li>
                    <li>Password  <input type='password' name='password' class="login-pass"></li>
            </ul>
            <br><input type="submit" value="LOGIN" class="btn-submit"/>
            <?php
               if(isset($_GET['login_failed']) && $_GET['login_failed'] == 1) {
                  echo '<p style="color: red;">Wrong username or password.</p>';
               }
            ?>
            </form>
        </div>
    </body>
</html>
