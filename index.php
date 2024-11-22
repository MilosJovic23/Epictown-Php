<?php

    require_once "classes/User.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }



    echo "Index page";