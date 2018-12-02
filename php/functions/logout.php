<?php

    require '../class/LoginUser.Class.php';
    
    $loginController = new LoginUser();
    $loginController->Logout();
    $loginController->oSmarty->display("index.tpl");
    
