<?php
session_start();
require __DIR__.'/../../class/service/UserService.Class.php';

 $oUserService = new UserService();

$aUserData = array();
if(isset($_SESSION['userDetails']["id"])){
    $aUserData['id'] = $_SESSION['userDetails']["id"];  
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

if(isset($_POST[]))


if($oUserService->updateUser2($aUserData))
    echo "Pomyślna aktualizacja danych użytkownika!";
else
    echo "Nieudana aktualizacja danych użytkownika.";





