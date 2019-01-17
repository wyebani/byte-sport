<?php

/*******************************************************************************
 * @brief Function deletes team by id                                          *
 * @author Marek                                                               *
 * @date 29.11.2018                                                            *
 ******************************************************************************/

require __DIR__.'/../../../class/service/TeamService.Class.php';

$oTeamService = new TeamService();
$iTeamId = $_POST['teamId'];

if($iTeamId) {
    $bResult = $oTeamService->deleteTeam($iTeamId);
    return $bResult;
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/