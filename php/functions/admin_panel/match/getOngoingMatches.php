<?php

/*******************************************************************************
 * @brief Function returns table with onoging matches                          *
 * @author Marek                                                               *
 * @date 02.12.2018                                                            *
 ******************************************************************************/

require __DIR__.'/../../../class/service/MatchService.Class.php';
require __DIR__.'/../../../class/service/TeamService.Class.php';
require __DIR__.'/../../../class/service/LeagueService.Class.php';
require __DIR__.'/../../../class//MatchStatus.Enum.php';

$oMatchService = new MatchSerice();
$oLeagueService = new LeagueService();
$oTeamService = new TeamService();

$aMatches = $oMatchService->getMatchesByStatus(MatchStatus::ONGOING);

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
            echo '<td scope="col">TRWAJĄCE</td>'; 
             echo '<td scope="col">'.
                        '<a class="editMatch" title="Edytuj"><i class="fas fa-edit text-warning"></i></a>'.
                        '</th>';
        echo '</tr>';
    }
} else {
    echo '<strong style="color: red; font-size: 14px">Brak trwających meczów w bazie danych!</strong>';
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/