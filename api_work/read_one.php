<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET");

include_once '../config/Database.php';
include_once '../classes/Work.php';

/* Instantiate DB and connect */
$database = new Database();
$db = $database->connect();

/* Instantiate post object */
$work = new Work($db);
/* GET */
$work->work_id = isset($_GET['work_id']) ? $_GET['work_id'] : die();
/* Get work */
$work->getOne();


/* Create array of works */
$work_arr = array(
    'work_id' => $work->work_id,
    'company' => $work->company,
    'title' => $work->title,
    'length' => $work->length,

);

/* print in JSON format */
print_r(json_encode($work_arr));