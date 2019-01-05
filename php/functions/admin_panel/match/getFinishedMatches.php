<?php

require __DIR__.'/../../../class/service/MatchService.Class.php';
require __DIR__.'/../../../class/service/TeamService.Class.php';
require __DIR__.'/../../../class/service/LeagueService.Class.php';
require __DIR__.'/../../../class//MatchStatus.Enum.php';

$oMatchService = new MatchSerice();
$oLeagueService = new LeagueService();
$oTeamService = new TeamService();

$aMatches = $oMatchService->getMatchesByStatus(MatchStatus::FINISHED);

if($aMatches) {
    foreach ($aMatches as $key => $value) {
        echo '<tr>';
            echo '<th scope="col">'.$value['id'].'</th>';
            $aHost = $oTeamService->getTeam($value['host_id']);
            echo '<td scope="col">'.$aHost['name'].'</td>';
            $aGuest = $oTeamService->getTeam($value['guest_id']);
            echo '<td scope="col">'.$aGuest['name'].'</td>';
            echo '<td scope="col">'.$value['host_score'].':'.$value['guest_score'].'</td>';
            echo '<td scope="col">'.$value['date_time'].'</td>'; 
            echo '<td scope="col">'.$value['season'].'</td>'; 
            $aLeague = $oLeagueService->getLeague($value['league_id']);
            echo '<td scope="col">'.$aLeague['name'].'</td>'; 
            echo '<td scope="col">ZAKOŃCZONE</td>'; 
        echo '</tr>';
    }
} else {
    echo '<strong style="color: red; font-size: 14px">Brak zakończonych spotkań w bazie danych!</strong>';
}
