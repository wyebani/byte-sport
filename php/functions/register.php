<?php
    require '../class/RegisterUser.Class.php';
    
    $registerController = new RegisterUser();
    
    $aUserData = array('username' => $_POST['username'],
        'password' => $_POST['password'],
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'date_of_birth' => $_POST['date_of_birth'],
        'email' => $_POST['email']);
    
    $result = $registerController->Register($aUserData);
    
    if($result) {
        echo "Zarejestrowano pomyślnie";
    } else {
        echo "Wystąpił błąd";
    }
    
    
