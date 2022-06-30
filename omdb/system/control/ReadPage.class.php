<?php

require_once('./system/util/UserId.class.php');
require_once('./system/util/Api.class.php');

class ReadPage extends AbstractPage {

    public function code()
    {
        $user = new UserId($_GET['name'], $_GET['password']);

        $sql = "SELECT * FROM rates WHERE user_id = '".$user->userid."'";
        $data = AppCore::getDB()->sendQuery($sql);
        $row = array();
        while($onerow = mysqli_fetch_array($data)) {
            $row[] = $onerow;
        }

        $this->templateName = 'read';
        $this->v['data'] = [
            $this->decodedrow = $row
         ];

    }
}

?>