<?php

require '../../../class/service/TeamService.Class.php';

$oTeamService = new TeamService();
$iTeamId = $_POST['teamid'];

if($iTeamId) {
    $bResult = $oTeamService->deleteTeam($iTeamId);
    
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
}