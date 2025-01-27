
<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Origin: http://localhost:3000");
    include ("../../classes/User.php");

    $user = new User();
    $conn = $user->connection;
    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents('php://input'),true);

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit;
    }

    switch ( $method ) {
        case "POST":

            $username = $input["username"] ;
            $password = $input["password"] ;

            if ( !isset($username) || !isset($password) ) {
                echo json_encode(["message" => "Username and password are required"]);
                exit;
            }
            $register = $user->register( $username, $password );
            if ( !$register ) {
                http_response_code(409);
                echo json_encode(["message" => "User with that email already exists"]);
                exit;
            }
            http_response_code(201);
            echo json_encode(["message" => "User successfully registered"]);
            break;
        default:
            http_response_code(405);
            header("Allow: POST");
            echo json_encode(["message" => "Method not allowed"]);
            break;

    }