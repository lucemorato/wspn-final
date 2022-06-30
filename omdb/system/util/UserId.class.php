<?php
class UserId {
  
    public  $userid;
    public  $name;
    public  $password;
    
    public function __construct($name, $password) {
        $this->name=$name;
        $this->password=$password;
        $this->getId(); 
    }
    private function getId() {
        $query="SELECT * FROM users WHERE name='$this->name' AND password='$this->password'";
        $result=AppCore::getDB()->sendQuery($query);
        if(mysqli_num_rows($result) == 1)
        {
            while($row = $result->fetch_assoc())
            {
            $this->userid = $row['user_id'];
            }
        }
    }
}
?>