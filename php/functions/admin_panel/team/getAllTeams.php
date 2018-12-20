<?php

require __DIR__.'/../../../class/service/TeamService.Class.php';

$oTeamService = new TeamService();
$aTeams = $oTeamService->getAllTeams();

if($aTeams) {
    echo '<input list="all_teams" name="team" class="inputclass"/>';
    echo '<datalist id="all_teams">';
    foreach ($aTeams as $key => $value) {
        echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
    }
    echo '</datalist>';
} else {
    echo '<strong style="color: red; font-size: 14px">Brak drużyn w bazie danych!</strong>';
}


