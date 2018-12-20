<?php

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();
$iUserId = $_POST['userId'];

if($iUserId) {
    $bResult = $oUserService->deleteUser($iUserId);
}

$aUsers = $oUserService->getAllUsers();
    
if($aUsers) {
    echo '<input list="All_users" name="User" class="inputclass"/>';
    echo '<datalist id="All_users">';
        foreach ($aUsers as $key => $value) {
            echo '<option value="'.$value['username'].'"/>';
        }
    echo '</datalist>';
} else {
    echo '<strong style="color: red; font-size: 14px">Brak użytkowników w bazie danych!</strong>';
}
