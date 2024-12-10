<?php




    header("Content-type: application/json");
    include ("../classes/Database.php");

    $conn = new Database();
    $db = $conn->connection;

    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents("php://input"),true);

    switch ( $method ) {
        case "POST":
            handlePost($db,$input);
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
            echo json_encode(["error" => "Method not allowed"]);
            break;
    }


    function handlePost($db,$input):void {
        var_dump($db);
        echo json_encode(["message"=>"user created"]);
    }