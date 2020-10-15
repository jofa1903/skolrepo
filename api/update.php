<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-typ: application/json; charset = UTF - 8');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

/* includes */
include_once '../config/Database.php';
include_once '../classes/Courses.php';

/* variables for creating new database object and connection to database */
$database = new Database();
$db = $database->connect();

/* Instantiate post object */
$courses = new Courses($db);

/* if id exists preceed */
$courses->id = isset($_GET['id']) ? $_GET['id'] : die();


/* JSON decode */
$data = json_decode(file_get_contents('php://input'));

/* Set ID to update */
$courses->code = $data->code;
$courses->name = $data->name;
$courses->progression = $data->progression;
$courses->coursesyllabus = $data->coursesyllabus;


/* Update post */
if ($courses->update()) {
    /* set response code - 200 ok */
    http_response_code(200);
    echo json_encode(
        array('message' => 'Course updated!')
    );
} else {
    /* set response code - 503 service unavailable */
    http_response_code(503);
    echo json_encode(
        array('message' => 'Course not updated!')
    );
}