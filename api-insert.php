<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

include 'config.php';


$sql = "INSERT INTO students(student_name,age,city) VALUES ('{$name}', {$age}, '{$city}')";
// echo $sql;
//
// die();

if (mysqli_query($conn, $sql)) {
  echo json_encode(array('message' => 'Value inserted into db.', 'status' => true));
} else {
  echo json_encode(array('message' => 'Value doesnot inserted.', 'status' => false));
}

?>
