<?php

/*******************************************************************************
 * @brief Function returns one user by id                                      *
 * @author Marek                                                               *
 * @date 27.11.2018                                                            *
 ******************************************************************************/

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();
$iUserId = $_GET['userId'];

if($iUserId) {
    $sQuery = 'SELECT u.id, u.username, u.password, u.permissions, u.active, ';
    $sQuery .= 'ud.name, ud.surname, ud.date_of_birth, ud.email, ud.login_success, ud.login_failure ';
    $sQuery .= 'FROM `user` as u ';
    $sQuery .= 'INNER JOIN `user_details` as ud ';
    $sQuery .= 'ON u.id = ud.id ';
    $sQuery .= 'WHERE u.id = '.$iUserId;
    $aUser = $oUserService->oMySql->otherQuery($sQuery);
    if($aUser) {
        echo json_encode($aUser['0']);
    } else {
        '<strong style="color: red; font-size: 14px">Błąd podczas komunikacji z bazą danych!</strong>';
    }
    
} else {
    echo '<strong style="color: red; font-size: 14px">Nie ma takiego użytkownika</strong>';
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/