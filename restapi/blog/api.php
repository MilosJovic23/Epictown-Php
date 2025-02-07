<?php


    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");
    include ("../../classes/Blog.php");

    $blogData = new Blog();
    $conn = $blogData->connection;
    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents('php://input'),true);

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit;
    }

    if ($method !== "GET") {
        http_response_code(405);
        echo json_encode(["success" => false, "message" => "Method not allowed"]);
        exit;
    }

    $result = $blogData->getBlogData();

    if( !$result ) {
        http_response_code(400);
        echo json_encode(["success" => false, "message" => "Data not found"]);
        exit;
    }

    http_response_code(200);
    echo json_encode($result);
