
<?php


    require_once __DIR__ . '/../classes/User.php';

    $db = new Database();
    $conn = $db->connection;
    $query = 'SELECT * FROM comicbooks';

    $result = $conn->query($query);
    $allComics = $result->fetch_all(MYSQLI_ASSOC);


?>

    <h1>Epictown</h1>

    <?php foreach ( $allComics as $comic ): ?>
        <div style="width: 150px;">
            <a href="HtmlComponents/singleProduct.php?id=<?= $comic['id'] ?>">
                <img src="<?= $comic['imgURL'] ?>" style="width: 150px;">
            </a>
            <h4> <?=  $comic['title'] ?></h4>
            <i> author: <?=  $comic['author'] ?></i>
            <p> rating: <?=  $comic['rating'] ?></p>
        </div>

    <?php endforeach; ?>

