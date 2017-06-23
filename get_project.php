<?php
    $has_page = false;
    include 'check_connection.php';
    if((!isset($_GET['ProjName']) && !isset($_GET['ProjWBS'])) || ($_GET['ProjName'] == '' && $_GET['ProjWBS'] == '')) {
        $sql = 'SELECT * FROM project_map ORDER BY LastUpdate DESC';
    } else {
        $sql = 'SELECT * FROM project_map WHERE';
        if($_GET['ProjName'] != '') {
            $sql .= ' ProjName LIKE "' . $_GET['ProjName'] . '%"';
        }
        if($_GET['ProjWBS'] != '') {
            if($_GET['ProjName'] != '') {
                $sql .= ' AND';
            }
            $sql .= ' ProjWBS LIKE "' . $_GET['ProjWBS'] . '%"';
        }
        $sql .= ' ORDER BY LastUpdate DESC';
    }
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
        echo "[]";
    }
?>
