<?php

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();

$iUserId = $_POST['userId'];
if($iUserId) {
    $iResult = $oUserService->activateUser($iUserId);
    if($iResult > 0) {
        return true;
    } else {
        return false;
    }
} else {
    return false;
}
