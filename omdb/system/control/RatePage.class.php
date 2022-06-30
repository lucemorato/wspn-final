<?php
/**
* @author Katija Jurić i Lucija Mikulić
* @copyright 2022
*/



require_once('./system/util/Api.class.php');
require_once('./system/util/UserId.class.php');
require_once('./system/util/Movie.class.php');



class RatePage extends AbstractPage {



public $ime;
public $zanr;
public $godina;
public $rate;
public $userid;




public function code() {



    $user = new UserId($_GET['name'], $_GET['password']);
    $movieId = new Movie($_GET['moviename']);
    $moviename = $_GET['moviename'];
    $rate = $_GET['rate'];

    $movie = Api::getOmdbRecordByTitle($moviename,APIKEY);
    $movieArray = json_decode(json_encode($movie, JSON_FORCE_OBJECT), JSON_PRETTY_PRINT);

    $checkquery = "SELECT * FROM rates WHERE movie_id='".$movieId->movie_id."' AND user_id='".$user->userid."'";
    $result = AppCore::getDB()->sendQuery($checkquery);
    $exists = mysqli_num_rows($result);
    if($exists > 0)
    {
        echo "Duplikat";
    }
    else
    {
        $sql = "INSERT INTO movies(title, year, genre) VALUES ('".$movieArray['Title']."','".$movieArray['Year']."','".$movieArray['Genre']."')";
        AppCore::getDB()->sendQuery($sql);

        $sqlQuery = "INSERT INTO rates(rate, user_id, movie_id)
            VALUES (
                '".$rate."',
                '".$user->userid."',
                '".AppCore::getDB()->getLastID()."'
            )";
        AppCore::getDB()->sendQuery($sqlQuery);
        echo "Film spremljen.";
    }

    


    $this->templateName = 'rate';
    $this->v['resursi'] = [
    $this->ime = $movieArray['Title'],
    $this->zanr = $movieArray['Genre'],
    $this->godina = $movieArray['Year'],
    ];
    }



}