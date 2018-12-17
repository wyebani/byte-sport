<?php

require '../../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();
$sLeagueName = $_POST['leagueName'];
$sCountry = $_POST['country'];

if(!empty($sLeagueName)) {
    $bResult = $oLeagueService->addNewLeague($sLeagueName, $sCounty);
    
    if($bResult) {
        $aLeagues = $oLeagueService->getAllLeagues();
        
            if($aLeagues) {
            echo '<input list="All_league" name="League" class="inputclass"/>';
            echo '<datalist id="All_league">';
                foreach($aLeagues as $key => $value) {
                    echo '<option value="'.$value['name'].'">';
                }
            echo '</datalist>';
        }
    }
}
