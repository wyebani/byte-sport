<?php

require __DIR__.'/../../../class/service/TeamService.Class.php';

$oTeamService = new TeamService();
$iTeamId = $_GET['teamId'];

if($iTeamId) {
    
    $sQuery  = 'SELECT t.id, t.name, t.league_id, td.ground, td.head_coach, td.website ';
    $sQuery .= 'FROM `team` as t ';
    $sQuery .= 'INNER JOIN `team_details` as td ';
    $sQuery .= 'ON t.id = td.id ';
    $sQuery .= 'WHERE t.id = '.$iTeamId;
    
    $aTeamData = $oTeamService->oMySql->otherQuery($sQuery);
    
    if($aTeamData) {
       echo json_encode($aTeamData);
    }
}