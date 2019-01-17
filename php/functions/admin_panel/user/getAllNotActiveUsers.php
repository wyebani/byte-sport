<?php

/*******************************************************************************
 * @brief Function returns all not active users                                *
 * @author Marek                                                               *
 * @date 27.11.2018                                                            *
 ******************************************************************************/

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();
$aUsers = $oUserService->getAllNotActiveUsers();

if($aUsers) {
    echo '<input list="not_active_users" name="not_active_user" class="inputclass"/>';
    echo '<datalist id="not_active_users_list">';
    foreach ($aUsers as $key => $value) {
        echo '<option value="'.$value['id'].'">'.$value['username'].'</option>';
    }
    echo '</datalist>';
} else {
    echo '<strong style="color: red; font-size: 14px">Brak nieaktywnych użytkowników w bazie danych!</strong>';
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
