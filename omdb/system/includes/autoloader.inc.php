<?php

    spl_autoload_register('myAutoLoader');

    function myAutoLoader($className) {
        $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        if(strpos($url, 'includes') !== false) {
            $path = '../util/';
        }
        else {
            $path ="util/";
        }
        $extension = ".class.php";
        $fullPath = $path . $className . $extension;

        if(!file_exists($fullPath)) { //ako ne postoji file pod varijablom $fullPath...
            return false; //...vrati false
        }


        include_once $fullPath;
    }