<?php




    header("Content-type: application/json");
    include ("../classes/Database.php");

    $db = new Database();
    $conn = $db->connection;

    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents("php://input"),true);

    switch ( $method ) {
        case "POST":
            handlePost($conn,$input);
            break;
        case "GET":
                $ffd = 1;
            break;

        case "PUT":
            $dsa = 1;
            break;

        case "DELETE":
            $vds = 1;
            break;
        default:
            http_response_code(405);
            echo json_encode(["error" => "Method not allowed"]);
            break;
    }


    function handlePost($conn,$input):void {
        var_dump($conn);
        echo json_encode(["message"=>"user created"]);
    }