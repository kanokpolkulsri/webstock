<?php
$has_page = false;
include 'check_connection.php';
$table = $_GET['table'];
$sql = 'SELECT * FROM `' . $_GET['ProjWBS'] . '__' . $table . '`';

if(isset($_GET['q'])) {
    $q = json_decode($_GET['q']);
    if($table == 'tb_inv' && ($q[0] != '' || $q[1] != '')) {
        $sql .= ' WHERE';
        if($q[0] != '') {
            $sql .= ' InvNo LIKE "'.$q[0].'%"';
        }
        if($q[1] != '') {
            if($q[0] != '') {
                $sql .= ' AND';
            }
            $sql .= ' InvName LIKE "'.$q[1].'%"';
        }
        $sql .= ' ORDER BY InvNo';
    } else if($table == 'tb_rec' && ($q[0] != '' || $q[1] != '' || $q[2] != '')) {
        $sql .= ' WHERE';
        if($q[0] != '') {
            $sql .= ' RecDate = "'.$q[0].'"';
        }
        if($q[1] != '') {
            if($q[0] != '') {
                $sql .= ' AND';
            }
            $sql .= ' RecNo LIKE "'.$q[1].'%"';
        }
        if($q[2] != '') {
            if($q[0] != '' || $q[1] != '') {
                $sql .= ' AND';
            }
            $sql .= ' RecName LIKE "'.$q[2].'%"';
        }
        $sql .= ' ORDER BY RecDate';
    } else if($table == 'tb_out' && ($q[0] != '' || $q[1] != '' || $q[2] != '')) {
        $sql .= ' WHERE';
        if($q[0] != '') {
            $sql .= ' OutDate = "'.$q[0].'"';
        }
        if($q[1] != '') {
            if($q[0] != '') {
                $sql .= ' AND';
            }
            $sql .= ' OutNo LIKE "'.$q[1].'%"';
        }
        if($q[2] != '') {
            if($q[0] != '' || $q[1] != '') {
                $sql .= ' AND';
            }
            $sql .= ' OutName LIKE "'.$q[2].'%"';
        }
        $sql .= 'ORDER BY OutDate';
    }
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    $col_types = array();
    $q = $conn->query('DESCRIBE `' . $_GET['ProjWBS'] . '__' . $table . '`');
    while($row = $q->fetch_assoc()) {
        array_push($col_types, $row['Type']);
    }
    $output = "[";
    while($row = $result->fetch_assoc()) {
        $output .= '[';
        $i = 0;
        foreach($row as $key => $val) {
            if($key == 'ID' || $key == 'LastUpdate') {
                $i++;
                continue;
            }
            if(strpos($col_types[$i], 'float') !== false) {
                $val = number_format($val, 2);
            }
            $output .= '"' . $val . '",';
            $i++;
        }
        $output = substr($output, 0, strlen($output)-1);
        $output .= '],';
    }
    if($output[strlen($result)-1] != '[') {
        $output = substr($output, 0, strlen($output)-1);
    }
    $output .= "]";
    echo $output;
} else {
    echo '[]';
}
?>
