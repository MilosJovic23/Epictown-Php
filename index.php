<?php


    require_once "./classes/User.php";

    if( session_status() == PHP_SESSION_NONE ){
        session_start();
    }


    
    ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Epictown</title>
    </head>
    <body>
        <?php include "HtmlComponents/navbar.php"; ?>
        <?php include "HtmlComponents/comicList.php"; ?>




    </body>
</html>     

