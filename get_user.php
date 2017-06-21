<?php
$has_page = false;
include 'check_connection.php';
$data = array('Username'=>$_POST['username']);
$data['Name'] = $_POST['name'];
$data['Phone'] = $_POST['phone'];
$data['Company'] = $_POST['company'];
$data['Position'] = $_POST['position'];
$data['State'] = $_POST['status'];

$query = 'SELECT * FROM users';
$found = false;
foreach($data as $key => $val) {
    if($val == '') {
        continue;
    }
    if($found) {
        $query .= ' AND';
    } else {
        $found = true;
        $query .= ' WHERE';
    }
    $query .= ' ' . $key . ' LIKE "' . $val . '%"';
}
$result = $conn->query($query);
if($result->num_rows > 0) {
    $columns = array();
    $q = $conn->query('DESCRIBE `users`');
    while($row = $q->fetch_assoc()) {
        array_push($columns, $row['Field']);
    }
    $output = '[';
    while($row = $result->fetch_assoc()) {
        $output .= '[';
        $i = 0;
        foreach($row as $val) {
            if($columns[$i] == 'LastUpdate' || $columns[$i] == 'Password') {
                $i++;
                continue;
            }
            $output .= '"' . $val . '",';
            $i++;
        }
        if($output{strlen($output) - 1} != ']') {
            $output = substr($output, 0, strlen($output) - 1);
        }
        $output .= '],';
    }
    if($output{strlen($output) - 1} != ']') {
        $output = substr($output, 0, strlen($output) - 1);
    }
    $output .= ']';
    echo $output;
} else {
    echo 'nope';
}
?>
