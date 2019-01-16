<?php
session_start();
require __DIR__.'/../../class/service/UserService.Class.php';

$oUserService = new UserService();



if(isset($_SESSION['userDetails']["id"])){
    $iUserId = $_SESSION['userDetails']["id"];  
} 

$sQuery = 'SELECT u.id, u.username, u.password, u.permissions, u.active, ';
    $sQuery .= 'ud.name, ud.surname, ud.date_of_birth, ud.email, ud.login_success, ud.login_failure ';
    $sQuery .= 'FROM `user` as u ';
    $sQuery .= 'INNER JOIN `user_details` as ud ';
    $sQuery .= 'ON u.id = ud.id ';
    $sQuery .= 'WHERE u.id = '.$iUserId;
    $aUser = $oUserService->oMySql->otherQuery($sQuery);