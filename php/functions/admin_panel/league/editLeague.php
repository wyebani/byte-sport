<?php

require __DIR__.'/../../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();
$aLeagueData = array();

if(isset($_POST['id'])) {
    $aLeagueData['id'] = $_POST['id'];
}
if(isset($_POST['name'])) {
    $aLeagueData['name'] = $_POST['name'];
}
if(isset($_POST['country'])) {
    $aLeagueData['country'] = $_POST['country'];
}
if(isset($_POST['organizer'])) {
    $aLeagueData['organizer'] = $_POST['organizer'];
}
if(isset($_POST['date_of_found'])) {
    $aLeagueData['date_of_found'] = $_POST['date_of_found'];
}

$oLeagueService->updateLeague($aLeagueData);