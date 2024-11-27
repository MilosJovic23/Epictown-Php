

<?php



    require_once __DIR__ . '/../classes/User.php';

    $newConnection = new User();

    $query = 'SELECT * FROM `comicbooks`';
    $result = $newConnection->mysql->query($query);
    $row = $result->fetch_all(MYSQLI_ASSOC);

?>

    <h1>Epictown</h1>

    <?php foreach ( $row as $key ): ?>
        <div style="width: 150px;">
            <a href="HtmlComponents/singleProduct.php?id=<?= $key['id'] ?>">
                <img src="<?= $key['imgURL'] ?>" style="width: 150px;">
            </a>
            <h4> <?=  $key['title'] ?></h4>
            <i> author: <?=  $key['author'] ?></i>
            <p> rating: <?=  $key['rating'] ?></p>
        </div>



    <?php endforeach; ?>

