<?php
    $has_page = false;
    include 'check_connection.php';
    $sql = 'SELECT * FROM project_map ORDER BY LastUpdate DESC';
    $result = $conn->query($sql);

    // $result = $conn->query("SHOW DATABASES;");
    if ($result->num_rows > 0) {
        $output = '[';
        while($row = $result->fetch_assoc()) {
            $output .= '{ "ProjWBS" : "' . $row['ProjWBS'] . '", "ProjName" : "' . $row['ProjName']. '"}, ';
        }
        $output = substr($output, 0, strlen($output)-2);
        $output .= ']';
        echo $output;
    } else {
        echo "0";
    }
?>
