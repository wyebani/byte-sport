<?php

require __DIR__.'/../../../class/service/TeamService.Class.php';

$oTeamService = new TeamService();
$iTeamId = $_POST['teamId'];

if($iTeamId) {
    $bResult = $oTeamService->deleteTeam($iTeamId);
    return $bResult;
}