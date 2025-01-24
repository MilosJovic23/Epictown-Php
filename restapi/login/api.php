<?php


    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");
    include ("../../classes/User.php");

    $user = new User();
    $conn = $user->connection;
    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents('php://input'),true);

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit;
    }

    if ($method !== "POST") {
        http_response_code(405);
        echo json_encode(["success" => false, "message" => "Method not allowed"]);
        exit;
    }

    $result = $user->login($input);
    if (!$result) {
        http_response_code(401);
        echo json_encode(["success" => false, "message" => "Wrong credentials"]);
        exit;
    }

    http_response_code(200);
    echo json_encode(["success" => true, "message" => "Login successful"]);


