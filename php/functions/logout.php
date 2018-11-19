<?php

    require '../class/LoginUser.Class.php';
    
    $loginController = new LoginUser();
    $loginController->Logout();
    $loginController->getSmarty()->display("index.tpl");
    
