<?php

require __DIR__.'/../../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();
$aLeagues = $oLeagueService->getAllLeagues();

if($aLeagues) {
    echo '<input list="all_leagues" name="league" class="inputclass"/>';
    echo '<datalist id="all_leagues">';
    foreach ($aLeagues as $key => $value) {
        echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
    }
    echo '</datalist>';
}