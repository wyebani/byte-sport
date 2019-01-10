<?php

require __DIR__ . '/../../../class/service/MatchService.Class.php';
require __DIR__ . '/../../../class/service/TeamService.Class.php';
require __DIR__ . '/../../../class/service/LeagueService.Class.php';

if ($_GET['matchId']) {
    $oMatchService = new MatchSerice();
    $oTeamService = new TeamService();
    $oLeagueService = new LeagueService();

    $iMatchId = $_GET['matchId'];
    
    $aMatchData = $oMatchService->getMatch($iMatchId);
    $aHostData = $oTeamService->getTeam($aMatchData['host_id']);
    $aGuestData = $oTeamService->getTeam($aMatchData['guest_id']);
    $aLeagueData = $oLeagueService->getLeague($aMatchData['league_id']);

    if (!empty($aMatchData) && !empty($aHostData) && 
            !empty($aGuestData) && !empty($aLeagueData)) {
        $aReturnData = array();

        $aReturnData['id'] = $aMatchData['id'];
        $aReturnData['league_id'] = $aMatchData['league_id'];
        $aReturnData['host_id'] = $aMatchData['host_id'];
        $aReturnData['guest_id'] = $aMatchData['guest_id'];
        $aReturnData['status_id'] = $aMatchData['status_id'];
        $aReturnData['host_name'] = $aHostData['name'];
        $aReturnData['guest_name'] = $aGuestData['name'];
        $aReturnData['league_name'] = $aLeagueData['name'];
        $aReturnData['season'] = $aMatchData['season'];
        
        $aDateAndTime = explode(" ", $aMatchData['date_time']);
        $aReturnData['date'] = $aDateAndTime[0];
        $aReturnData['hour'] = $aDateAndTime[1];
        
        $aReturnData['result'] = $aMatchData['host_score'] . ':' . $aMatchData['guest_score'];
        
        echo json_encode($aReturnData);
    } else {
        echo json_encode(false);
    }
} else {
    echo json_encode(false);
}