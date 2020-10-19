<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-typ: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Typ, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../classes/Work.php';

/* Instantiate DB and connect */
$database = new Database();
$db = $database->connect();

/* Instatiate post object */
$work = new Work($db);

/* Get raw posted data */
$data = json_decode(file_get_contents("php://input"));

$work->company = $data->company;
$work->title = $data->title;
$work->length = $data->length;

/* Create post */
if ($work->create()) {
    echo json_encode(
        array('message' => 'Added new work')
    );
} else {
    echo json_encode(
        array('message' => 'Work not added!')
    );
}