

<?php


    if ( empty($_GET['description'])) {
        die("you need to enter a description");
    }
    if ( empty($_GET['title'])) {
        die("you need to enter a title");
    }
    if ( empty($_GET['author'])) {
        die("you need to enter a author");
    }
    if ( empty($_GET['rating'])) {
        die("you need to enter a rating");
    }
    if ( empty($_GET['imgURL'])) {
        die("you need to enter a imgURL");
    }
    if ( empty($_GET['format'])) {
        die("you need to enter a format");
    }

    $title = $_GET['title'];
    $author = $_GET['author'];
    $rating = $_GET['rating'];
    $imgURL = $_GET['imgURL'];
    $description = $_GET['description'];
    $format = $_GET['format'];


    require_once "../classes/ComicBooks.php";


    $newComic = new ComicBooks();
    $addNewComic = $newComic->add($description,$title,$format,$imgURL,$author,$rating);

    if ($addNewComic) {
        header("location: ../HtmlComponents/dashboard.php");
    }




?>