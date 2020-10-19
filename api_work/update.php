<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-typ: application/json; charset = UTF - 8');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once '../config/Database.php';
include_once '../classes/Work.php';

/* Instantiate DB and connect */
$database = new Database();
$db = $database->connect();

/* Instantiate post object */
$work = new Work($db);

/* GET */
$work->work_id = isset($_GET['work_id']) ? $_GET['work_id'] : die();


/* Get raw poted data */
$data = json_decode(file_get_contents('php://input'));


/* Set ID to update */
$work_id->work_id = $data->work_id;
$work->company = $data->company;
$work->title = $data->title;
$work->length = $data->length;



/* Update post */
if ($work->update()) {
    /* set response code - 200 ok */
    http_response_code(200);
    echo json_encode(
        array('message' => 'Work updated!')
    );
} else {
    /* set response code - 503 service unavailable */
    http_response_code(503);
    echo json_encode(
        array('message' => 'Work not updated!')
    );
}