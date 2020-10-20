<?php
    /* Headers */
    header('Access-Control-Allow-Origin: *');
    header('Content-typ: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Typ, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../config/Database.php';
    include_once '../classes/Webpages.php';

    /* Instantiate DB and connect */
    $database = new Database();
    $db = $database->connect();

    /* Instatiate post object */
    $webpages = new Webpages($db);

    /* Get raw posted data */
    $data = json_decode(file_get_contents("php://input"));
  
    $webpages->web_title = $data->web_title;
    $webpages->url = $data->url;
    $webpages->description = $data->description;

    /* Create post */
    if ($webpages->create()) {
        echo json_encode(
            array('message' => 'Added new Webpage')
        );
    } else {
        echo json_encode(
            array('message' => 'Webpage not added!')
        );
    }