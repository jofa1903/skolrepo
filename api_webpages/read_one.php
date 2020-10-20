<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET");

include_once '../config/Database.php';
include_once '../classes/Webpages.php';

/* Instantiate DB and connect */
$database = new Database();
$db = $database->connect();

/* Instantiate post object */
$webpages = new Webpages($db);
/* GET */
$webpages->web_id = isset($_GET['web_id']) ? $_GET['web_id'] : die();
/* Get work */
$webpages->getOne();


/* Create array of work */
$webpages_arr = array(
    'web_id' => $webpages->web_id,
    'web_title' => $webpages->web_title,
    'url' => $webpages->url,
    'description' => $webpages->description
);

/* print in JSON format */
print_r(json_encode($webpages_arr));