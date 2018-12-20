<?php

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();
$aUsers = $oUserService->getAllUsers();

if($aUsers) {
    echo '<input list="all_users" name="user" class="inputclass"/>';
    echo '<datalist id="all_users">';
    foreach ($aUsers as $key => $value) {
        echo '<option value="'.$value['id'].'">'.$value['username'].'</option>';
    }
    echo '</datalist>';
} else {
    echo '<strong style="color: red; font-size: 14px">Brak użytkowników w bazie danych!</strong>';
}
