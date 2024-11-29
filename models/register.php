
<?php


    require_once "../classes/User.php";

    if ( empty($_POST["email"]) ) {
        die("you need to specify an email");
    }
    if ( empty($_POST["password"]) ) {
        die("you need to specify a password");
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    $newUser = new User();



    if ( $newUser->register($email, $password) ){
        header("location: /Epictown/HtmlComponents/loginForm.php");
    } else {
        die("an error occurred while registering");
    }







?>