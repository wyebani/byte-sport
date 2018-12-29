<?php

require __DIR__.'/../../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();
$iLeagueId = $_POST['leagueId'];

if($iLeagueId) {
    $bResult = $oLeagueService->deleteLeague($iLeagueId);

}