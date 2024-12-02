

<?php


    if( session_status() == PHP_SESSION_NONE ){
        session_start();
    }

    require_once "../classes/Database.php";

    $db = new Database();
    $conn = $db->connection;

    $result = $conn->query("SELECT * FROM comicbooks");
    $allComics = $result->fetch_all(MYSQLI_ASSOC);


?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
    </head>
    <body>
        <?php require_once "navbar.php"; ?>
        <div>
            <h3>add new comicbook</h3>
            <form method="GET" action="../models/addNewComic.php">
                <input type="text" placeholder="description" name="description">
                <input type="text" placeholder="title" name="title">
                <input type="text" placeholder="format" name="format">
                <input type="text" placeholder="imgURL" name="imgURL">
                <input type="text" placeholder="author" name="author">
                <input type="number" placeholder="rating" name="rating" step="0.1" min="0" max="5" >
                <button type="submit">add</button>
            </form>
        </div>
        <?php foreach( $allComics as $comic ): ?>
            <div style="width: 150px;">
                <a href="singleProduct.php?id=<?= $comic['id'] ?>">
                    <img src="<?= $comic['imgURL'] ?>" style="width: 150px;">
                </a>
                <h4> <?=  $comic['title'] ?></h4>
                <i> author: <?=  $comic['author'] ?></i>
                <p> rating: <?=  $comic['rating'] ?></p>
                <form method="GET" action="../models/updateComic.php">
                    <input name="id" value="<?= $comic['id'] ?>" type="hidden">

                    <input value="<?=  $comic['title'] ?>"  name="title" >
                    <input value="<?=  $comic['description'] ?>"  name="description" >
                    <input value="<?=  $comic['format'] ?>"  name="format" >
                    <input value="<?=  $comic['imgURL'] ?>"  name="imgURL" >
                    <input value="<?=  $comic['author'] ?>"  name="author" >
                    <input value="<?=  $comic['rating'] ?>"  name="rating" >
                    <button type="submit">update</button>
                </form>
                <form method="GET" action="../models/deleteComic.php" style="margin-top:20px;margin-bottom:20px">
                    <input name="id" value="<?= $comic['id'] ?>" type="hidden">
                    <button type="submit">delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    </body>
</html>
