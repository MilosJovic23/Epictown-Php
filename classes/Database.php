

<?php

    class Database {

        public $mysql;

        public function __construct() {

            $this->mysql = new mysqli("localhost", "root", "", "epictown");

        }
    }