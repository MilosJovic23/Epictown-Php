

<?php

    include_once "../classes/User.php";

    if( session_status() == PHP_SESSION_NONE ){
        session_start();
    }

    $_SESSION['loggedIn'] = false;
    $user = new User();
    $user->logout();
    header('Location: /Epictown');
    exit;