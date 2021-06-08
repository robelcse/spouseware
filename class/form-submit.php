<?php



header("Content-Type: application/json");
require 'Database.php';

$db = new Database();

$sql = "SELECT * FROM projects";
$result = $db->select($sql);


$response = array();
if (!$result) {
    $response = array(
        'status' => false,
        'message' => 'An error occured...'
    );
}else {
    $response = array(
        'status' => true,
        'message' => 'Success',
        'data' => ph_fetch_all($result)
    );
}

return json_encode($response);


?>