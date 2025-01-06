
<?php

    require_once 'Database.php';
    class ComicBooks extends Database {



        public function getComics() :array {

            $sql = "SELECT * FROM comicbooks";
            $conn = $this->connection;
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);;

        }
        public function add($input) :void {

            $description = $this->connection->real_escape_string( $input["description"] );
            $title = $this->connection->real_escape_string( $input["title"] );
            $format = $this->connection->real_escape_string( $input["format"] );
            $imgURL = $this->connection->real_escape_string( $input["imgURL"] );
            $author = $this->connection->real_escape_string( $input["author"] );
            $rating = $this->connection->real_escape_string( $input["rating"] );

            $this->connection->query("INSERT INTO comicbooks 
                                            (description,title,format,imgURL,author,rating) 
                                            VALUES ('$description','$title','$format','$imgURL','$author',$rating) ");


        }

        public function delete($id) :bool {

            $comicId = $this->connection->real_escape_string( $id );
            $this->connection->query("DELETE FROM comicbooks WHERE id = '$comicId' ");

            return true;


        }
        public function update($input) :bool {

            $comicId = $this->connection->real_escape_string( $input["id"] );
            $description = $this->connection->real_escape_string( $input["description"] );
            $title = $this->connection->real_escape_string( $input["description"] );
            $format = $this->connection->real_escape_string( $input["description"] );
            $imgURL = $this->connection->real_escape_string( $input["description"] );
            $author = $this->connection->real_escape_string( $input["description"] );
            $rating = $this->connection->real_escape_string( $input["description"] );

            $this->connection->query(
                "UPDATE comicbooks 
                    SET description = '$description', title = '$title', 
                    format = '$format',imgURL = '$imgURL', author = '$author', rating = '$rating'
                    WHERE id = '$comicId' "
            );
            return true;

        }

        public function search( $searchTerm ) : array | stdClass {

            $searchTerm = $this->connection->real_escape_string($searchTerm);
            $result = $this->connection->query("SELECT * FROM comicbooks WHERE title LIKE '%$searchTerm%' OR author LIKE '%$searchTerm%' ");

            $foundResults = $result->fetch_all(MYSQLI_ASSOC);
            if ( $foundResults ) {
                return $foundResults;
            } else {
                return new stdClass();
            }

        }

    }