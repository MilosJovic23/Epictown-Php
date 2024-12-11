
<?php

    header("Content-type: application/json");
    include ("../classes/ComicBooks.php");

    $comicbook = new ComicBooks();
    $conn = $comicbook->connection;

    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents("php://input"),true);

    switch ( $method ) {

        case "POST":
            $comicbook->add($input);
            echo json_encode(["message"=>"successfully added comic book to database"]);
            break;
        case "GET":
            $result = $comicbook->getComics();
            echo json_encode($result);
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

