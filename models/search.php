
<?php


    require_once "../classes/Database.php";

    if ( empty($_GET["search"]) ) {
        die("you need to enter a search query");
    }

    $db = new Database();
    $conn = $db->connection;
    $searchTerm = $conn->real_escape_string($_GET["search"]);

    $result = $conn->query("SELECT * FROM comicbooks WHERE title LIKE '%$searchTerm%' OR author LIKE '%$searchTerm%' ");

    if ($result->num_rows > 0) {
        $foundComics = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        die("no results found");
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
        <?php foreach ( $foundComics as $comic ): ?>
        <div style="width: 150px;">
            <a href="/Epictown/HtmlComponents/singleProduct.php?id=<?= $comic['id'] ?>">
                <img src="<?= $comic['imgURL'] ?>" style="width: 150px;">
            </a>
            <h4> <?=  $comic['title'] ?></h4>
            <i> author: <?=  $comic['author'] ?></i>
            <p> rating: <?=  $comic['rating'] ?></p>
        </div>
        <?php endforeach; ?>



    </body>
</html>
