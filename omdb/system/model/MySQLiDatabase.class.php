<?php
/**
 * @author Katija Jurić i Lucija Mikulić
 * @copyright 2022
 */

 //include DatabaseException class
 require_once('./system/exception/DatabaseException.class.php');

 /**
  * Database implementacija
  */
class MySQLiDatabase {

    public $MySQLi;

    protected $host;
    protected $user;
    protected $password;
    protected $database;

    protected $queryCount = 0;

    /**
     * Kreira Database objekt
     */
    public function __construct($host, $user, $password, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;

        //spaja na MySQL Server
        $this->connect();
        //selektira db
        $this->selectDatabase();
    }

    /**
     * Funkcija za spajanje na MySQL Server
     */
    protected function connect() {
        $this->MySQLi = new MySQLi($this->host, $this->user, $this->password, $this->database);
        if(mysqli_connect_errno())
        {
            throw new DatabaseException("Connecting to MySQL server '".$this->host . "' failed." . $this); //TODO: je li zadnji $this error number ili?
 
        } 
    }

    /**
     * Selektira MySQL bazu, ako nije moguće ($database ne postoji) - daje grešku
     */
    public function selectDatabase()
    {
        if ($this->MySQLi->select_db($this->database) === false) {
            throw new DatabaseException("Cannot use database ".$this->database . $this);
        }
    }

    /**
     * Šalje database query MySQL serveru
     */
    public function sendQuery($query, $errorReporting = true)
    {
        $this->queryCount++; //TODO: ova funkcija zasto se broje queriji
        $this->result = $this->MySQLi->query($query);
        if ($this->result === false && $errorReporting === true) {
            throw new DatabaseException("Invalid SQL: " . $query);
        }

        return $this->result;
    }

    /**
     * Šalje database query MySQL serveru
     */
    public function getLastID()
    {
        return $this->MySQLi->insert_id;
    }

}


