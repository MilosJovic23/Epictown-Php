
<?php


    if ( session_status() == PHP_SESSION_NONE ) {
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
        <nav>
            <ul>
                <a href="/Epictown"><li>home</li></a>
                <?php if( isset($_SESSION['loggedIn'])): ?>
                <a href="/Epictown/models/logout.php"><li>Logout</li></a>
                <?php else: ?>
                <a href="/Epictown/HtmlComponents/loginForm.php"><li>login</li></a>
                <?php endif; ?>
            </ul>
        </nav>
    </body>
</html>