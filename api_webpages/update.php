<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-typ: application/json; charset = UTF - 8');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once '../config/Database.php';
include_once '../classes/Webpages.php';

/* Instantiate DB and connect */
$database = new Database();
$db = $database->connect();

/* Instantiate post object */
$webpages = new Webpages($db);

/* GET */
$webpages->web_id = isset($_GET['web_id']) ? $_GET['web_id'] : die();


/* Get raw poted data */
$data = json_decode(file_get_contents('php://input'));


/* Set ID to update */
$web_id->web_id = $data->web_id;
$webpages->web_title = $data->web_title;
$webpages->url = $data->url;
$webpages->description = $data->description;



/* Update post */
if ($webpages->update()) {
    /* set response code - 200 ok */
    http_response_code(200);
    echo json_encode(
        array('message' => 'Webpage updated!')
    );
} else {
    /* set response code - 503 service unavailable */
    http_response_code(503);
    echo json_encode(
        array('message' => 'Webpage not updated!')
    );
}