<?php
    require_once 'libs/Smarty.class.php';
    session_start();
    $oSmarty = new Smarty();
    $oSmarty->display("my_favourite_leagues.tpl");

