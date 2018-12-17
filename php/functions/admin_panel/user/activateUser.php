<?php

require '../../../class/service/UserService.Class.php';

$oUserService = new UserService();

$iUserId = $_POST['userId'];
if($iUserId) {
    $oUserService->activateUser($iUserId);
}
