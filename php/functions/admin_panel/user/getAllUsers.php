<?php

require '../../../class/service/UserService.Class.php';

$oUserService = new UserService();
$aUsers = $oUserService->getAllUsers();

if($aUsers) {
    echo '<input list="All_users" name="User" class="inputclass"/>';
    echo '<datalist id="All_users">';
    foreach ($aUsers as $key => $value) {
        echo '<option value="'.$value['username'].'"/>';
    }
    echo '</datalist>';
}
