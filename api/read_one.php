<?php
/* Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
 /* allowed methods */
header("Access-Control-Allow-Methods: GET");

/* includes */
include_once '../config/Database.php';
include_once '../classes/Courses.php';

/* variables for creating new database object and connection to database */
$database = new Database();
$db = $database->connect();

/* create new course object */
$course = new Courses($db);

/* if id exists preceed */
$course->id = isset($_GET['id']) ? $_GET['id'] : die();

/* call method to get course*/
$course->getOne();

/* Create array of courses */
$course_arr = array(
    'id' => $course->id,
    'code' => $course->code,
    'name' => $course->name,
    'progression' => $course->progression,
    'coursesyllabus' => $course->coursesyllabus
);

/* print in JSON format */
print_r(json_encode($course_arr));