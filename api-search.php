<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"), true);
$searched_value = $data['search'];

// $searched_value = isset($_GET['search']) ? $_GET['search'] : die(); // use for get request

include 'config.php';

$sql = "SELECT * FROM students where student_name LIKE '%{$searched_value}%'";

$result = mysqli_query($conn, $sql) or die("Query Failed.");
// print_r($result);
// die();

if (mysqli_num_rows($result) > 0) {

  $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo json_encode($output);

} else {
  echo json_encode(array('message' => 'No search Found.', 'status' => false));
}
?>
