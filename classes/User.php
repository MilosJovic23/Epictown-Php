<?php

    require_once "Database.php";
    class User extends Database {


        public function login($email, $password) {

            $db = $this->mysql;
            $email = mysqli_real_escape_string( $this->mysql,$email );

            $result = $db->query("SELECT * FROM users WHERE email = '$email'");

            if ( $result->num_rows == 0 ) {
                die("user not found with this email");
            }

            $user = $result->fetch_assoc();
            $loggedIn = false;

            if ( password_verify( $password, $user['password'] ) ) {
                $loggedIn = true;
            }
            return $loggedIn;
        }

        public function register($email, $password) {

            $db = $this->mysql;
            $email = mysqli_real_escape_string( $this->mysql,$email);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $result = $db->query("SELECT * FROM users WHERE email = '$email'");

            if ( $result->num_rows > 0 ) {
                die("user with that email already exists");
            }

            $db->query("INSERT INTO users (email, password) VALUES ('$email', '$password')");
            return true;
        }

        public function logout() {

            if( session_status() == PHP_SESSION_ACTIVE ) {

                session_unset();
                session_destroy();
                return true;

            }

            return false;

        }


    }