<?php

require __DIR__.'/../../../class/service/TeamService.Class.php';

$oTeamService = new TeamService();
$iLeagueId = $_GET['leagueId'];

if(!empty($iLeagueId)) {
    $aTeams = $oTeamService->getTeamsByLeagueId($iLeagueId);
    if($aTeams) {
        foreach($aTeams as $key => $value) {
            echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
        }
    }
}

