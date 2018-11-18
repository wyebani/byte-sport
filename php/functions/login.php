<?php
    require '../class/LoginUser.Class.php';
    
    $loginController = new LoginUser();
    $isLogin = $loginController->Login($_POST['username'], $_POST['password']);
    
    if($isLogin) {
        $loginController->getSmarty()->display("index.tpl");
    } else {
        
    }

