
<?php


    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents('php://input'),true);

    require_once "../../classes/ComicBooks.php";

    switch ($method) {
        case 'POST':
            $searchTerm = $input["search"];
            $comics = new ComicBooks();
            $result = $comics->search($searchTerm);
            echo is_array($result) ? json_encode($result) : json_encode(["message" => "No results found"]);
            http_response_code(201);
            break;
        default:
            header('Allow: POST');
            echo json_encode(["error" => "Method not allowed"]);
            http_response_code(405);
            break;

    }
