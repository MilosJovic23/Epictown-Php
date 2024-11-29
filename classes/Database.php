

<?php

    class Database {

        public mysqli $connection;

        public function __construct() {

            $this->connection = new mysqli("localhost", "root", "", "epictown");

        }
    }