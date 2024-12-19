
<?php


    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents('php://input'),true);

    require_once "../../classes/ComicBooks.php";

    switch ($method) {
        case 'POST':
            $searchTerm = $input["search"];
            $comicbook = new ComicBooks();
            $result = $comicbook->search($searchTerm);
            echo is_array($result) ? json_encode($result) : json_encode(["message" => "No results found"]);
            http_response_code(201);
            break;
        default:
            http_response_code(405);
            header('Allow: POST');
            echo json_encode(["error" => "Method not allowed"]);
            break;

    }
