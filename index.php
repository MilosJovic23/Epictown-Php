<?php



    if( session_status() == PHP_SESSION_NONE ){
        session_start();
    }


    
    ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Document</title>
    </head>
    <body>
        <?php include "HtmlComponents/navbar.php"; ?>
        <h1>homepage</h1>
    </body>
</html>     

