<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once 'MySql.php';
            require_once 'LoginUser.Class.php';
            require_once 'RegisterUser.Class.php';
            
            $mydb = new MySql();
            $mydb->connect();
                        
            $register = new RegisterUser($mydb);
            
            $aUserData = array('username' => 'tomczyk.marek',
                               'password' => 'marek123',
                                'name' => 'Marek',
                                'surname' => 'Tomczyk',
                                'date_of_birth' => date('1997-08-31'),
                                'email' => 'tomczyk.marek33@gmail.com');
            
            $bResult = $register->Register($aUserData);
            
            if($bResult) {
                echo 'Rejestracja przebiegła pomyślnie';
            } else {
                echo 'Wystąpił jakiś błąd';
            }
            
                      
            
         
            
        ?>

    </body>
</html>
