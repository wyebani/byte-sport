<?php

/*******************************************************************************
* @brief Function returns user data.                                           *
* @author Paweł                                                                *
* @date 16.01.2019                                                             *
*******************************************************************************/

session_start();
require __DIR__ . '/../../class/service/UserService.Class.php';

$oUserService = new UserService();



if (isset($_SESSION['userDetails']["id"])) {
    $iUserId = $_SESSION['userDetails']["id"];
}

$sQuery = 'SELECT u.id, ';
$sQuery .= 'ud.name, ud.surname, ud.date_of_birth, ud.email ';
$sQuery .= 'FROM `user` as u ';
$sQuery .= 'INNER JOIN `user_details` as ud ';
$sQuery .= 'ON u.id = ud.id ';
$sQuery .= 'WHERE u.id = ' . $iUserId;

if ($aUser = $oUserService->oMySql->otherQuery($sQuery))
    echo json_encode($aUser[0]);    

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/

