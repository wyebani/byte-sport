<?php
    require '../class/LoginUser.Class.php';

    
/*******************************************************************************
 * @brief User login fuctionality                                              *
 * @author Marek                                                               *
 * @date 10.11.2018                                                            *
 ******************************************************************************/
        
    $loginController = new LoginUser();
    $isLogin = $loginController->Login($_POST['username'], $_POST['password']);
    
    if($isLogin) {
	$loginController->oSmarty->display("user.tpl");
    } else {
        
    }
 
/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/