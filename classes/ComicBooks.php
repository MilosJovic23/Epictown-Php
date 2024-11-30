
<?php

    require_once 'Database.php';
    class ComicBooks extends Database {


        public function add($description,$title,$format,$imgURL,$author,$rating): true
        {

            $description = $this->connection->real_escape_string( $description );
            $title = $this->connection->real_escape_string( $title );
            $format = $this->connection->real_escape_string( $format );
            $imgURL = $this->connection->real_escape_string( $imgURL );
            $author = $this->connection->real_escape_string( $author );
            $rating = $this->connection->real_escape_string( $rating );

            $this->connection->query("INSERT INTO comicbooks (description,title,format,imgURL,author,rating) VALUES ('$description','$title','$format','$imgURL','$author',$rating) ");
            return true;
        }

        public function delete($id) {

            $comicId = $this->connection->real_escape_string( $id );

            $result = $this->connection->query("DELETE FROM comicbooks WHERE id = '$comicId' ");

            if ($result) {
                return true;
            }
            die("comic with that id doesnt exist");
        }

    }