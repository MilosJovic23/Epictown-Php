

<?php

    class Database {

        public mysqli $mysql;

        public function __construct() {

            $this->mysql = new mysqli("localhost", "root", "", "epictown");

        }
    }