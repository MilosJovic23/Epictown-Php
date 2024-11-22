<?php

    require_once "../classes/User.php";



    if (isset($_POST["email"]) && empty($_POST["email"])) {
        die("you need to specify an email");
    }
    if (isset($_POST["password"]) && empty($_POST["password"])) {
        die("you need to specify a password");
    }



    $email = $_POST["email"];
    $password = $_POST["password"];



    $newUser = new User();


    $login = $newUser->login($email, $password);
    if ( $login ){
        session_start();
        $_SESSION["loggedIn"] = true;
        header("location: ../index.php");
    } else {
        die("Invalid username or password.");
    }

