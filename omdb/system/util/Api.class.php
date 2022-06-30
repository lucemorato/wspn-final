<?php

//https://rapidapi.com/blog/how-to-use-an-api-with-php/
//https://stackoverflow.com/questions/57123361/how-to-connect-ombd-api-using-php-script
class Api {

    public static function getOmdbRecordByTitle($title, $APIKEY)
    {
        $path = "http://www.omdbapi.com/?t=$title&apikey=$APIKEY";
        $json = file_get_contents($path);
        return json_decode($json, TRUE);
    }

}