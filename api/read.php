<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

/* includes */
include_once '../config/Database.php';
include_once '../classes/Courses.php';

/* variables for creating new database object and connection to database */
$database = new Database();
$db = $database->connect();

/* create new course object */
$course = new Courses($db);

/* Query */
$result = $course->getAll();

/* return affected rows */
$num = $result->rowCount();

/* Check if posts are available */
if ($num > 0) {
    $course_arr = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $course_item = array(
            'id' => $id,
            'code' => $code,
            'name' => $name,
            'progression' => $progression,
            'coursesyllabus' => $coursesyllabus
        );

        /* Push to data */
        array_push($course_arr, $course_item);
    }
    /* encode JSON + error message */
    echo json_encode($course_arr);
    http_response_code(200);
} else {
    http_response_code(404);
    echo json_encode(array('message' => 'No courses available!'));
}
