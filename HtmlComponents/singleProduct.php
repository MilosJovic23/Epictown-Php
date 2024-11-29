
<?php


    if( session_status() == PHP_SESSION_NONE ){
        session_start();
    }

    require_once  "../classes/User.php";

    if ( !isset($_GET["id"]) ) {
        die("page with this id doesnt exist");
    }

    $db = new Database();
    $conn = $db->connection;
    $id = $conn->real_escape_string($_GET['id']);

    $query = 'SELECT * FROM comicbooks WHERE id = "' . $id . '"';

    $result = $conn->query($query);
    $comicbook = $result->fetch_assoc();


?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>singleProduct</title>
    </head>
    <body>

        <?php include "navbar.php"; ?>
        <main>
                <div>
                    <a>
                        <img src="<?= $comicbook['imgURL'] ?>" alt="<?= $comicbook['title'] ?>"/>
                    </a>
                    <h4> <?=  $comicbook['title'] ?></h4>
                    <i> author: <?=  $comicbook['author'] ?></i>
                    <p> <?=  $comicbook['description'] ?> </p>
                    <p> rating: <?=  $comicbook['rating'] ?></p>
                </div>
        </main>

    </body>
</html>
