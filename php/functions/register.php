<?php

    require '../class/RegisterUser.Class.php';

/*******************************************************************************
 * @brief User register fuctionality                                           *
 * @author Marek                                                               *
 * @date 10.11.2018                                                            *
 ******************************************************************************/
    session_start();
    
    $registerController = new RegisterUser();
    
    $aUserData = array('username' => $_POST['username'],
        'password' => $_POST['password'],
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'date_of_birth' => $_POST['date_of_birth'],
        'email' => $_POST['email']);
    
    $result = $registerController->Register($aUserData);
    echo json_encode($result);
    
    
/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
    
    
