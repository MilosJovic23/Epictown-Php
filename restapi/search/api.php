
<?php


    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents('php://input'));

    require_once "../../classes/ComicBooks.php";

    $comicbook = new ComicBooks();
    $comicbook->search($input);


