<?php



    if ( empty($_GET['title']) ) {
        die("title is required");
    }
    if ( empty($_GET['description']) ) {
        die("description is required");
    }
    if ( empty($_GET['author']) ) {
        die("author is required");
    }
    if ( empty($_GET['format']) ) {
        die("format is required");
    }
    if ( empty($_GET['rating']) ) {
        die("rating is required");
    }
    if ( empty($_GET['imgURL']) ) {
        die("imgURL is required");
    }

    $title = $_GET['title'];
    $description = $_GET['description'];
    $author = $_GET['author'];
    $format = $_GET['format'];
    $rating = $_GET['rating'];
    $imgURL = $_GET['imgURL'];
    $id = $_GET['id'];

    require_once "../classes/ComicBooks.php";

    $Comicbook = new ComicBooks();
    $updateComicbook = $Comicbook->update( $id,$description,$title,$format,$imgURL,$author,$rating );

    if ( $updateComicbook ){
        header("location:../HtmlComponents/dashboard.php");
    }
    die("there was an error updating database");




?>