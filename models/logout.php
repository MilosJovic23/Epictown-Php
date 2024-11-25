

<?php


    include_once "../classes/User.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $user = new User();
    $user->logout();
    $_SESSION['loggedIn'] = false;
    header('Location: /Epictown');