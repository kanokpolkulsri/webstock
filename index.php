<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="login">
           <form class="" action="./categorize.php" method="post">
            <ul class='login'>
                    <li>Username: <input type='text' name='username'></li>
                    <li>Password: <input type='password' name='password'></li>
            </ul>
            <br><input type="submit" value="Submit">
            <?php
               if(isset($_GET['login_failed']) && $_GET['login_failed'] == 1) {
                  echo '<p style="color: red;">Wrong username or password.</p>';
               }
            ?>
            </form>
        </div>
    </body>
</html>
