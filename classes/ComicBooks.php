
<?php

    require_once 'Database.php';
    class ComicBooks extends Database {



        public function getComics() {

            $sql = "SELECT * FROM comicbooks";
            $conn = $this->connection;
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);;

        }
        public function add($input) :string
        {

            $description = $this->connection->real_escape_string( $input["description"] );
            $title = $this->connection->real_escape_string( $input["title"] );
            $format = $this->connection->real_escape_string( $input["format"] );
            $imgURL = $this->connection->real_escape_string( $input["imgURL"] );
            $author = $this->connection->real_escape_string( $input["author"] );
            $rating = $this->connection->real_escape_string( $input["rating"] );

            $this->connection->query("INSERT INTO comicbooks 
                                            (description,title,format,imgURL,author,rating) 
                                            VALUES ('$description','$title','$format','$imgURL','$author',$rating) ");
            return $this->connection->lastInsertId();
        }

        public function delete($id) {

            $comicId = $this->connection->real_escape_string( $id );
            $result = $this->connection->query("DELETE FROM comicbooks WHERE id = '$comicId' ");

            if ($result) {
                return true;
            }
            die("comic with that id doesn't exist");
        }
        public function update($id,$description,$title,$format,$imgURL,$author,$rating): bool {

            $comicId = $this->connection->real_escape_string( $id );
            $description = $this->connection->real_escape_string( $description );
            $title = $this->connection->real_escape_string( $title );
            $format = $this->connection->real_escape_string( $format );
            $imgURL = $this->connection->real_escape_string( $imgURL );
            $author = $this->connection->real_escape_string( $author );
            $rating = $this->connection->real_escape_string( $rating );

            $this->connection->query(
                "UPDATE comicbooks 
                    SET description = '$description', title = '$title', 
                    format = '$format',imgURL = '$imgURL', author = '$author', rating = '$rating'
                    WHERE id = '$comicId' "
            );
            return true;
        }

    }