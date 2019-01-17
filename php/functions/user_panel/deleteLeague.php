<?php
//deletes favourite league
require __DIR__.'/../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();
$iLeagueId = $_POST['leagueId'];

if($iLeagueId) {
    $bResult = $oLeagueService->oMySql->delete("user_leagues",array('id' => $iLeagueId));            

}