<?php

require '../../../class/service/TeamService.Class.php';

$oTeamService = new TeamService();
$sTeamName = $_POST['teamName'];
$iLeagueId = $_POST['leagueId'];

$bResult = $oTeamService->addNewTeam($sTeamName, $iLeagueId);

if($bResult) {
    $aTeams = $oTeamService->getAllTeams();
    
    if($aTeams) {
        echo '<input list="team" name="Teams" class="inputclass"/>';
        echo '<datalist id="team">';
            foreach ($aTeams as $key => $value) {
                echo '<option value="'.$value['name'].'">';
            }
        echo '</datalist>';
    }
}
