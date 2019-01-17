<?php
session_start();
require __DIR__.'/../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();

$iUserId = $_SESSION['userDetails']["id"];

 $sQuery = 'SELECT ul.id, ul.league_id, l.name '; 
$sQuery .= 'FROM `user_leagues` as ul ';
$sQuery .= 'INNER JOIN `league` as l ';
$sQuery .= 'ON ul.league_id = l.id ';
$sQuery .= 'WHERE ul.user_id = '. $iUserId;
  
if($aLeague = $oLeagueService->oMySql->otherQuery($sQuery)){
    //for($i = 0; $i < count($aLeague); $i++){
    echo json_encode($aLeague);
    //}
}
