<?php

require __DIR__.'/../../../class/service/TeamService.Class.php';
require __DIR__.'/../../../class/service/LeagueService.Class.php';

$oTeamService = new TeamService();
$oLeagueService = new LeagueService();
$aTeams = $oTeamService->getAllTeams();


if($aTeams) {
    foreach($aTeams as $key => $value) {
        echo '<tr>';
            echo '<th scope="col">'.$value['id'].'</th>';
            echo '<td scope="col">'.$value['name'].'</th>';
            $aLeague = $oLeagueService->getLeague($value['league_id']);
            echo '<td scope="col">'.$aLeague['name'].'</th>';
            echo '<td scope="col">'.
                        '<a class="editTeam" title="Edytuj"><i class="fas fa-edit text-warning"></i></a>'.
                        '<a class="deleteTeam" title="Usuń"><i class="fas fa-trash text-danger"></i></a>'.
                        '</th>';
        echo '</tr>';
    }
} else {
    echo '<strong style="color: red; font-size: 14px">Brak drużyn w bazie danych!</strong>';
}


