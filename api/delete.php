<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-typ: application/json');
/* allowed methods */
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Typ, Access-Control-Allow-Methods, Authorization, X-Requested-With');

/* includes */
include_once '../config/Database.php';
include_once '../classes/Courses.php';


/* variables for creating new database object and connection to database */
$database = new Database();
$db = $database->connect();

/* New instance of course object*/
$courses = new Courses($db);

$id = $courses->id;

/* Update post */
if ($courses->delete($id)) {
    echo json_encode(
        /* message in array if success */
        array('message' => 'Course deleted!')
    );
} else {
    echo json_encode(
        /* message in array if faliure */
        array('message' => 'Course not deleted')
    );
}