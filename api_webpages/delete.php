<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-typ: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Typ, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../classes/Webpages.php';


/* Instantiate DB and connect */
$database = new Database();
$db = $database->connect();

/* Instatiate post object */
$webpages = new Webpages($db);
$web_id = $work->web_id;

/* Update post */
if ($webpages->delete($web_id)) {
    echo json_encode(
        array('message' => 'Webpage deleted!')
    );
} else {
    echo json_encode(
        array('message' => 'Webpage not deleted')
    );
}