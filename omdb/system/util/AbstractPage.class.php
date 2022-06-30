<?php

abstract class AbstractPage {
    function __construct() {
        $this->code();
        $this->show();
    }

    function show() {
        $v = $this->v ?? [];
        require_once(SYSTEM . 'view/' . $this->templateName . '.tpl.php');
    }
}