<?php
/**
 * @author Katija Jurić i Lucija Mikulić
 * @copyright 2022
 */

require_once('./system/util/Api.class.php');

class FetchPage extends AbstractPage {

    public $ime;
    public $zanr;
    public $godina;

    public function code() {


        $name = $_GET['name'];
        $password = $_GET['password'];
        $moviename = $_GET['moviename'];

        $movie = Api::getOmdbRecordByTitle($moviename,APIKEY);
        $movieArray = json_decode(json_encode($movie, JSON_FORCE_OBJECT), JSON_PRETTY_PRINT);  

        $this->templateName = 'fetch';
        $this->v['resursi'] = [
            $this->ime = $movieArray['Title'],
            $this->zanr = $movieArray['Genre'],
            $this->godina = $movieArray['Year']
         ];
    }

}