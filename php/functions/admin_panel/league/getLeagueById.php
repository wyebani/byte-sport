<?php

require __DIR__.'/../../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();
$iLeagueId = $_GET['leagueId'];

if($iLeagueId) {
    $sQuery  = 'SELECT l.id, l.name, l.country_id, ld.organizer, ld.date_of_found ';
    $sQuery .= 'FROM `league` as l ';
    $sQuery .= 'LEFT JOIN `league_details` as ld ';
    $sQuery .= 'ON l.id = ld.id ';
    $sQuery .= 'WHERE l.id = '.$iLeagueId;
    $aLeague = $oLeagueService->oMySql->otherQuery($sQuery);
    if($aLeague) {
        echo json_encode($aLeague['0']);
    }
}else {
    echo '<strong style="color: red; font-size: 14px">Podana liga nie istnieje</strong>';
}

