<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../classes/Work.php';

/* Instantiate DB and connect */
$database = new Database();
$db = $database->connect();

/* Instantiate post object */
$work = new Work($db);
$work_id = $work->work_id;

/* Delete post */
if ($work->delete($work_id)) {
    echo json_encode(
        array('message' => 'Work deleted!')
    );
} else {
    echo json_encode(
        array('message' => 'Work not deleted!')
    );
}