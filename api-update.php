<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

include 'config.php';


$sql = "UPDATE students SET student_name = '{$name}', age = {$age}, city = '{$city}' WHERE id = $id";
// echo $sql;
//
// die();

if (mysqli_query($conn, $sql)) {
  echo json_encode(array('message' => 'Value updated into db.', 'status' => true));
} else {
  echo json_encode(array('message' => 'Value doesnot updated.', 'status' => false));
}

?>
