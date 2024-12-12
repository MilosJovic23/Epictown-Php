<?php

    require_once "Database.php";
    class User extends Database {

        public function login($email, $password) :bool {

            $email = mysqli_real_escape_string( $this->connection,$email );
            $result = $this->connection->query("SELECT * FROM users WHERE email = '$email'");

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

        public function register($email, $password) :bool {

            $email = mysqli_real_escape_string( $this->connection,$email);
            $password = password_hash($password, PASSWORD_BCRYPT);
            $result = $this->connection->query("SELECT * FROM users WHERE email = '$email'");

            if ( $result->num_rows > 0 ) {
                return  false;
            }
            $this->connection->query("INSERT INTO users (email, password) VALUES ('$email', '$password')");
            return true;

        }

        public function logout(): bool {

            if( session_status() == PHP_SESSION_ACTIVE ) {

                session_unset();
                session_destroy();
                return true;

            }
            return false;

        }

    }