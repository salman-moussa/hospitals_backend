<?php
header('Access-Control-Allow-Origin: *');
include('connection.php');
$employees= $mysqli->prepare('select id, name from users where usertype_id = (select id from user_types where name = "employee")');
$employees->execute();

$array = $employees->get_result();
$response = [];
while ($a = $array->fetch_assoc()) {
    $response[] = $a;
}
echo json_encode($response);

?>