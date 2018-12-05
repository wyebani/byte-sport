<?php
    require '../class/LoginUser.Class.php';

    
/*******************************************************************************
 * @brief User login fuctionality                                              *
 * @author Marek                                                               *
 * @date 10.11.2018                                                            *
 ******************************************************************************/
    session_start();
    
    $loginController = new LoginUser();
    $isLogin = $loginController->Login($_POST['username'], $_POST['password']);
    
    if($isLogin) {
        header("Location: ../../index.php");
        die();
    } else {
        
    }
 
/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/