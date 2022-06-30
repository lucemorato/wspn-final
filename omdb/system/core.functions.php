<?php
/**
 * @author Katija Jurić i Lucija Mikulić
 * @copyright 2022
 */

 //postavi metodu handleException() kao zadanu PHP metodu za obradu Exception-a
set_exception_handler(array('AppCore', 'handleException'));

//TODO: ovo na mom compu opet baca gresku

function showError($e) {
    var_dump($e);
    exit("Error!");
}