
<?php

    include ("../classes/ComicBooks.php");

    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Methods: POST, GET, PATCH, DELETE");
    header("Access-Control-Allow-Origin: http://localhost:3000");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }
    $method = $_SERVER["REQUEST_METHOD"];

    $input = json_decode(file_get_contents("php://input"),true);
    $comicbook = new ComicBooks();
    $conn = $comicbook->connection;

    switch ( $method ) {

        case "POST":
            $result = $comicbook->add($input);
            if ($result) {
                echo json_encode(["message"=>"successfully added comic book to database"]);
            }
            http_response_code(201);
            break;
        case "GET":
            $result = $comicbook->getComics();
            echo json_encode($result);
            http_response_code(200);
            break;
        case "PATCH":
            $result = $comicbook->update($input);
            if ( $result ) {
                echo json_encode(["message"=>"successfully updated comic book"]);
            }
            http_response_code(200);
            break;
        case "DELETE":
            $result = $comicbook->delete($input["id"]);
            if ( $result ) {
                echo json_encode(["message"=>"successfully deleted comic book with id ".$input["id"]]);
            }
            http_response_code(200);
            break;
        default:
            header("Allowed methods: PATCH, DELETE, POST, GET");
            http_response_code(405);
            break;

    }

