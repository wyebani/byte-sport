<?php

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();

$aUserData = array();
if(isset($_POST['id'])) {
    $aUserData['id'] = $_POST['id'];
}
if(isset($_POST['username'])) {
    $aUserData['username'] = $_POST['username'];
}
if(isset($_POST['name'])) {
    $aUserData['name'] = $_POST['name'];
}
if(isset($_POST['surname'])) {
    $aUserData['surname'] = $_POST['surname'];
}
if(isset($_POST['email'])) {
    $aUserData['email'] = $_POST['email'];
}
if(isset($_POST['date_of_birth'])) {
    $aUserData['date_of_birth'] = $_POST['date_of_birth'];
}
if(isset($_POST['new_password']) && isset($_POST['password_confirm'])) {
    if($_POST['new_password'] == $_POST['password_confirm']) {
        $aUserData['password'] = $_POST['new_password'];
    }
}
if(isset($_POST['permissions'])) {
    $aUserData['permissions'] = $_POST['permissions'];
}
if(isset($_POST['active'])) {
    $aUserData['active'] = $_POST['active'];
}


$oUserService->updateUser($aUserData);




