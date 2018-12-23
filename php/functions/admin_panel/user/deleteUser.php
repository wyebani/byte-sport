<?php

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();
$iUserId = $_POST['userId'];

if($iUserId) {
    $bResult = $oUserService->deleteUser($iUserId);
    return $bResult;
}

