<?php

class Movie {
    public $movie_id;
    private $title;
    private $year;
    private $genre;

    public function __construct($title)
    {
        $this->title = $title;
        $this->getMovieId(); 
    }

    public function getMovieId() {
        $sql = "SELECT  *
            FROM    movies
            WHERE   title like  '%".$this->title."%'";
        $result=AppCore::getDB()->sendQuery($sql);
        if(mysqli_num_rows($result) == 1)
        {
            while($row = $result->fetch_assoc())
            {
                  $this->movie_id = $row['movie_id'];
            }
        }
    }

    // public function getApiRecords() {
        
    // }
}