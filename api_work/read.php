<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

include_once '../config/Database.php';
include_once '../classes/Work.php';


/* Instantiate DB and connect */
$database = new Database();
$db = $database->connect();

/* Instantiate post object */
$work = new Work($db);

/* Query */
$result = $work->getAll();
/* Row count */
$num = $result->rowCount();

/* Check if posts are available */
if ($num > 0) {
    $work_arr = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $work_item = array(
            'work_id' => $work_id,
            'company' => $company,
            'title' => $title,
            'length' => $length
        );

        /* Push to data */
        array_push($work_arr, $work_item);
    }
    /* encode JSON + error message */
    echo json_encode($work_arr);
    http_response_code(200);
} else {
    http_response_code(404);
    echo json_encode(array('message' => 'No work available!'));
}