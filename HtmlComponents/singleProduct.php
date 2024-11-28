


<?php

    if( session_status() == PHP_SESSION_NONE ){
        session_start();
    }


    require_once  "../classes/User.php";

    if ( !isset($_GET["id"]) ) {
        die("page with this id doesnt exist");
    }

    $newConnection = new User();
    $conn = $newConnection->mysql;
    $id = $conn->real_escape_string($_GET['id']);

    $query = 'SELECT * FROM comicbooks WHERE id = "' . $id . '"';

    $result = $conn->query($query);

    $comic = $result->fetch_assoc();


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
                        <img src="<?= $comic['imgURL'] ?>" alt="<?= $comic['title'] ?>"/>
                    </a>
                    <h4> <?=  $comic['title'] ?></h4>
                    <i> author: <?=  $comic['author'] ?></i>
                    <p> <?=  $comic['description'] ?> </p>
                    <p> rating: <?=  $comic['rating'] ?></p>
                </div>

        </main>

    </body>

</html>
