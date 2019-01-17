<?php

/*******************************************************************************
* @brief Function returns user leagues.                                        *
* @author Paweł                                                                *
* @date 16.01.2019                                                             *
*******************************************************************************/

session_start();
require __DIR__ . '/../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();

$iUserId = $_SESSION['userDetails']["id"];

$sQuery  = 'SELECT ul.id, ul.league_id, l.name ';
$sQuery .= 'FROM `user_leagues` as ul ';
$sQuery .= 'INNER JOIN `league` as l ';
$sQuery .= 'ON ul.league_id = l.id ';
$sQuery .= 'WHERE ul.user_id = ' . $iUserId;
$sQuery .= ' GROUP BY ul.league_id';

$aLeagues = $oLeagueService->oMySql->otherQuery($sQuery);

if ($aLeagues) {
    foreach($aLeagues as $key => $value) {
        echo '<tr>';
            echo '<td scope="col">'.$value['name'].'</td>';
            echo '<td scope="col">'.
                        '<a class="deleteLeague" title="Usuń"><i class="fas fa-trash text-danger"></i></a>'.
                        '</th>';
        echo '</tr>';
    }
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
