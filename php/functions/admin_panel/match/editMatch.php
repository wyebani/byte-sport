<?php

require __DIR__ . '/../../../class/service/MatchService.Class.php';
require __DIR__ . '/../../../class/service/TeamBilansService.Class.php';
require_once __DIR__.'/../../../class//MatchStatus.Enum.php';

if(isset($_POST['id']) &&
    isset($_POST['league_id']) &&
    isset($_POST['status_id']) &&
    isset($_POST['host_id']) &&
    isset($_POST['guest_id']) &&
    isset($_POST['result']) && 
    isset($_POST['season']) &&
    isset($_POST['date']) &&
    isset($_POST['time'])) {
    $bResult = true;
} else {
    $bResult = false;
}

if($bResult) {
    $oMatchService = new MatchSerice();
    $aMatchData = array();
    
    $aMatchData['id'] = $_POST['id'];
    $aMatchData['league_id'] = $_POST['league_id'];
    $aMatchData['status_id'] = $_POST['status_id'];
    $aMatchData['host_id'] = $_POST['host_id'];
    $aMatchData['guest_id'] = $_POST['guest_id'];
    $aMatchData['season'] = $_POST['season'];
    $aMatchData['date_time'] = date('Y-m-d H:i:s', strtotime($_POST['date']." ".$_POST['time']));
    
    $aResult = explode(":", $_POST['result']);
    $aMatchData['host_score'] = $aResult[0];
    $aMatchData['guest_score'] = $aResult[1];
    
    $bResult = $oMatchService->updateMatch($aMatchData);
    
    if($bResult && $aMatchData['status_id'] == MatchStatus::FINISHED) {
        $oTeamBilansService = new TeamBilansService();
        $bResult = $oTeamBilansService->updateTeamBilansAfterMatch($aMatchData);
    }
}

if($bResult) {
    echo "Spotkanie zostało zaktualizowane!";
} else {
    echo "Wystąpił błąd podczas aktualizacji spotkania! Spróbuj później!";
}