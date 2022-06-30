<?php
require_once('./system/util/Api.class.php');
require_once('./system/util/UserId.class.php');
require_once('./system/util/Movie.class.php');
class DeletePage extends AbstractPage {

    public function code () {
        
    $user = new UserId($_GET['name'], $_GET['password']);
    $movname = $_GET['moviename'];
    $sql = "DELETE FROM movies WHERE title = '".$movname."' ";
    AppCore::getDB()->sendQuery($sql);
    


    $this->templateName = 'delete';
    $this->v['resursi'] = [

    ];
    }
}