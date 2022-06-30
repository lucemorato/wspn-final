<?php
/**
 * @author Katija Jurić i Lucija Mikulić
 * @copyright 2022
 */

  /**
  * SystemException implementacija
  * Exception class je osnovna klasa za sve greške
  */
class SystemException extends Exception {

      /**
     * parametri:
     * @param $message - exception message
     * @param $code - exception code
     * @param $previous - previously thrown exception
     */
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        //constructs the exception kad imamo klasu koja extenda Exception class
        parent::__construct($message, $code, $previous);
    }

    //metoda koja daje info o pogrešci 
    //metode getMessage, getFile, getLine i getTraceAsString su predefinirane metode Exception klase i nije ih potrebno definirati
    public function show() {
        echo "Error: " . $this->getMessage(); //tekst pogreške
        echo "File: " . $this->getFile(); //File
        echo "Line: " . $this->getLine(); //linija
        echo "StackTrace: " . $this->getTraceAsString(); //stacktrace
    }
}