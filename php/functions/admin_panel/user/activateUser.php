<?php

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();

$iUserId = $_POST['userId'];
if($iUserId) {
    $iResult = $oUserService->activateUser($iUserId);
    if($iResult > 0) {
        echo 'Pomyślnie aktywowano użytkownika!';
    } else {
        echo 'Wystąpił błąd podczas aktualizowania użytkownika!';
    }
} else {
    echo 'Nie wybrano użytkownika!';
}
