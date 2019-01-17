<?php

/*******************************************************************************
 * @brief Function which shows user-panel.tpl                                  *
 * @author Michał                                                              *
 * @date 08.01.2019                                                            *
 ******************************************************************************/

require '../class/LoginUser.Class.php';
session_start();

$loginController = new LoginUser();
$loginController->oSmarty->display("user-panel.tpl");

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
