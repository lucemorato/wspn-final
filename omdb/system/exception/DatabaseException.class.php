<?php
/**
 * @author Katija Jurić i Lucija Mikulić
 * @copyright 2022
 */

 /**
  * DatabaseException implementacija
  * Exception class je osnovna klasa za sve greške
  */
class DatabaseException extends Exception {

    /**
     * parametri:
     * @param string $message - exception message
     * @param integer $code - exception code
     * @param throwable $previous - previously thrown exception
     */
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        //constructs the exception kad imamo klasu koja extenda Exception class
        parent::__construct($message, $code, $previous);
    }
}