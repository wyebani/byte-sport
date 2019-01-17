<?php

/*******************************************************************************
 * @brief Function deletes one user by id                                      *
 * @author Marek                                                               *
 * @date 26.11.2018                                                            *
 ******************************************************************************/

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();
$iUserId = $_POST['userId'];

if($iUserId) {
    $bResult = $oUserService->deleteUser($iUserId);
    return $bResult;
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/