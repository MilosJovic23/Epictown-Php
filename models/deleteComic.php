
<?php


    require_once "../classes/ComicBooks.php";

    $id = $_GET['id'];
    $comicbook = new ComicBooks();

    $deletedComic = $comicbook->delete($id);
    if ($deletedComic) {
        header("location: ../HtmlComponents/dashboard.php");
    }

    die("there was an error while deleting this item from database");


?>