<?php

    require '../class/LoginUser.Class.php';
    
/*******************************************************************************
 * @brief Logout fuctionality                                                  *
 * @author Marek                                                               *
 * @date 10.11.2018                                                            *
 ******************************************************************************/
    
    $loginController = new LoginUser();
    $loginController->Logout();
    $loginController->oSmarty->display("index.tpl");
    
/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
    
