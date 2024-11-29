

<?php






?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
    </head>
    <body>
        <form method="GET" action="../models/addNewComic.php">
            <input type="text" placeholder="description" name="description">
            <input type="text" placeholder="title" name="title">
            <input type="text" placeholder="format" name="format">
            <input type="text" placeholder="imgURL" name="imgURL">
            <input type="text" placeholder="author" name="author">
            <input type="number" placeholder="rating" name="rating" step="0.1" min="0" max="5" >
            <button type="submit">add</button>
        </form>
    </body>
</html>
