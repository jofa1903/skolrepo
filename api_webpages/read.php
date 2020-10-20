<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

include_once '../config/Database.php';
include_once '../classes/Webpages.php';


/* Instantiate DB and connect */
$database = new Database();
$db = $database->connect();

/* Instantiate post object */
$webpages = new Webpages($db);

/* Query */
$result = $webpages->getAll();
/* Row count */
$num = $result->rowCount();

/* Check if posts are available */
if ($num > 0) {
    $webpages_arr = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $webpages_item = array(
            'web_id' => $web_id,
            'web_title' => $web_title,
            'url' => $url,
            'description' => $description
        );

        /* Push to data */
        array_push($webpages_arr, $webpages_item);
    }
    /* encode JSON + error message */
    echo json_encode($webpages_arr);
    http_response_code(200);
} else {
    http_response_code(404);
    echo json_encode(array('message' => 'No webpages available!'));
}