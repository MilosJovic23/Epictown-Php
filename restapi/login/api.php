<?php


    header("Content-type: application/json");
    include ("../../classes/User.php");

    $user = new User();
    $conn = $user->connection;

    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents('php://input'));
    $userExist = $user->register($input['username'], $input['password']);

    if($userExist){
        echo json_encode(["message" => "User already exists"]);
    }