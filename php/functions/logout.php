<?php

    require __DIR__.'/../class/LoginUser.Class.php';
    
/*******************************************************************************
 * @brief Logout fuctionality                                                  *
 * @author Marek                                                               *
 * @date 10.11.2018                                                            *
 ******************************************************************************/
    session_start();
    
    $loginController = new LoginUser();
    $loginController->Logout();
    header("Location: ../../index.php");
    
/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
    
