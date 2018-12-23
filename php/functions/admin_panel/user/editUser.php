<?php

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();

$aUserData = array();
$aUserData['id'] = $_POST['id'];
$aUserData['username'] = $_POST['username'];
$aUserData['name'] = $_POST['name'];
$aUserData['surname'] = $_POST['surname'];
$aUserData['email'] = $_POST['email'];
$aUserData['date_of_birth'] = $_POST['date_of_birth'];
if(isset($_POST['new_password'])) {
    $aUserData['new_password'] = $_POST['new_password'];
}

$bResult = $oUserService->updateUser($aUserData);




