<?php

    require_once "Database.php";
    class User extends Database {

        public function login($input) :array {

            $email = mysqli_real_escape_string( $this->connection,$input["username"] );
            $password = mysqli_real_escape_string( $this->connection,$input["password"] );
            $result = $this->connection->query("SELECT * FROM users WHERE email = '$email'");

            if ($result->num_rows === 0) {
                http_response_code(401);
                return ["success" => false, "message" => "User not found"];
            }

            $user = $result->fetch_assoc();
            $loggedIn = password_verify($password, $user['password']);

            if ( !$loggedIn ) {
                http_response_code(401);
                return ["success" => false, "message" => "Invalid credentials"];
            }
            return ["success" => true, "message" => "Login successful"];
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


    }