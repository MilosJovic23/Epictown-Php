
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
        case "PATCH":

            break;
        case "DELETE":
            $comicbook->delete($input["id"]);
            echo json_encode(["message"=>"successfully deleted comic book with id ".$input["id"]]);
            break;
        default:
            http_response_code(405);
            header("Allowed methods: PATCH, DELETE, POST, GET");
            break;

    }

