
<?php

    require_once 'Database.php';
    class Blog extends Database {


        public function getBlogData() :array
        {
            $sql = "SELECT * FROM my_data";
            $conn = $this->connection;
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);;
        }
    }