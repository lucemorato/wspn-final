<?php
/**
 * @author Katija Jurić i Lucija Mikulić
 * @copyright 2022
 */

 //implementira klasu RequestHandler za procesuiranje korisnickih zahtjeva
 class RequestHandler {

    public function __construct($className)
    {
        $className = $className.'Page';
        $classPath = SYSTEM . 'control/' . $className . '.class.php';

        //include class
        require_once($classPath);

        //execute class
        if(!class_exists($className)) {
            throw new SystemException("Class '" .$className . "' not found");
        }
        new $className(); 

    }

    /**
     * Hendla http request
     */
    //TODO: objasnit ovu funkciju?
    public static function handle() {
        if(!empty($_GET['page']) || !empty($_POST['page'])) {
            new RequestHandler((!empty($_GET['page']) ? $_GET['page'] : $_POST['page']));
        } else {
            new RequestHandler('Index');
        }
    }


 }
