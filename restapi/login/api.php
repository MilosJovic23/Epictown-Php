<?php


    header("Content-type: application/json");
    header("Access-Control-Allow-Origin: POST");
    header("Access-Control-Allow-Origin: http://localhost:3000");

    include ("../../classes/User.php");

    $user = new User();
    $conn = $user->connection;
    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents('php://input'),true);

    if ( $method !== "POST" ) {
        echo json_encode(["message" => "Method not allowed"]);
        exit;
    }
    $result = $user->login($input);
    if( !$result ){
        echo json_encode(["message" => "wrong credentials"]);
        http_response_code(401);
        exit;
    }
    http_response_code(202);
    echo json_encode(["message"=>"success"]);

