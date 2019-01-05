<?php

require __DIR__.'/../../../class/service/TeamService.Class.php';

$oTeamService = new TeamService();
$aTeamData = array();

if(isset($_POST['id'])) {
    $aTeamData['id'] = $_POST['id'];
}
if(isset($_POST['name'])) {
    $aTeamData['name'] = $_POST['name'];
}
if(isset($_POST['league_id'])) {
    $aTeamData['league_id'] = $_POST['league_id'];
}
if(isset($_POST['ground'])) {
    $aTeamData['ground'] = $_POST['ground'];
}
if(isset($_POST['head_coach'])) {
    $aTeamData['head_coach'] = $_POST['head_coach'];
}
if(isset($_POST['website'])) {
    $aTeamData['website'] = $_POST['website'];
}

$oTeamService->updateTeam($aTeamData);

