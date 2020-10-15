<?php
    /* Headers */
    header('Access-Control-Allow-Origin: *');
    header('Content-typ: application/json');
    /* allowed methods */
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Typ, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    /* includes */
    include_once '../config/Database.php';
    include_once '../classes/Courses.php';

    /* variables for creating new database object and connection to database */
    $database = new Database();
    $db = $database->connect();

    /* New instance of course object*/
    $courses = new Courses($db);

    /* decoding JSON */
    $data = json_decode(file_get_contents("php://input"));
    $courses->code = $data->code;
    $courses->name = $data->name;
    $courses->progression = $data->progression;
    $courses->coursesyllabus = $data->coursesyllabus;

    /* put course object into databse if obejct exists */
    if ($courses->create()) {
        echo json_encode(
            /* message in array success */
            array('message' => 'Added new course')
        );
    } else {
        echo json_encode(
            /* faliure */
            array('message' => 'Course not added!')
        );
    }