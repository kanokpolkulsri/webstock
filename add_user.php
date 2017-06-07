<?php
    $has_page = false;
    include 'check_connection.php';

    $cost = 10;
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
    $salt = sprintf("$2a$%02d$", $cost) . $salt;
    $hash = crypt($_POST['password'], $salt);
    $sql = 'INSERT INTO users (Username,Password,Name,Phone,Company,Position,State,LastUpdate) VALUES ("' . $_POST['username'] . '","' . $hash . '","' . $_POST['name'] . '","' . $_POST['phone'] . '","' . $_POST['company'] . '","' . $_POST['position'] . '","' . $_POST['state'] . '",' . 'NOW())';
    // echo $sql;
    if($conn->query($sql)) {
        echo 'success';
    } else {
        echo $conn->error;
    }
?>
