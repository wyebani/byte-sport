<?php

/*******************************************************************************
 * @brief Function return table content for league.                            *
 * @author Michał, Marek                                                       *
 * @date 05.01.2019                                                            *
 ******************************************************************************/

require __DIR__ . '/../class/service/TeamBilansService.Class.php';

$oTeamBilansService = new TeamBilansService();

if (isset($_GET["league"])) {
    $sLeagueName = $_GET['league'];
}
else {
    $sLeagueName = 'Ekstraklasa'; 
}

$aTeams = $oTeamBilansService->getAllByLeagueSorted($sLeagueName);
$iPosition = 1;

if ($aTeams) {
    foreach ($aTeams as $key => $value) {
        echo '<tr style="text-align: center">';
            echo '<th scope="col">'.$iPosition.'</td>';
            echo '<td scope="col">'.$value['name'].'</th>';
            echo '<td scope="col">'.$value['matches_played'].'</th>';
            echo '<td scope="col">'.$value['points'].'</th>';
            echo '<td scope="col">'.$value['wins'].'</th>';
            echo '<td scope="col">'.$value['draws'].'</th>';
            echo '<td scope="col">'.$value['losses'].'</th>';
            echo '<td scope="col">'.$value['scored_goals'].':'.$value['lost_goals'].'</th>';
        echo '</tr>';
        
        $iPosition++;
    }
} else {
    echo "Brak drużyn dla danej ligi";
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/