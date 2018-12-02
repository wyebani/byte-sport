<?php
    require '../class/LoginUser.Class.php';
    
/*******************************************************************************
 * @brief Admin login fuctionality                                             *
 * @author Paweł                                                               *
 * @date 15.11.2018                                                            *
 ******************************************************************************/
    
    $loginController = new LoginUser();
    $isLogin = $loginController->LoginAdmin($_POST['username'], $_POST['password']);
    
	
    if($isLogin) {
        $loginController->oSmarty->display("login_admin.tpl");
    } else {
        echo "Nie udało się zalogować";
    }
    
/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/



