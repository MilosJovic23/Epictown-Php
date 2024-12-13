
<?php


    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents('php://input'),true);

    require_once "../../classes/ComicBooks.php";

    $searchTerm = $input["search"];


    switch ($method) {
        case 'POST':

            $comicbook = new ComicBooks();
            $comicbook->search($searchTerm);

            echo json_encode($comicbook);
            break;
    }
