<?php




    header("Content-type: application/json");
    include ("../classes/Database.php");

    $method = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents("php://input"),true);

    switch ( $method ) {
        case "POST" :

    }