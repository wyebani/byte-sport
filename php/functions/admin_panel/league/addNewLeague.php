<?php

require __DIR__.'/../../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();
$sLeagueName = $_POST['leagueName'];
$sCountry = $_POST['country'];

if(!empty($sLeagueName) && !empty($sCountry)) {
    $bResult = $oLeagueService->addNewLeague($sLeagueName, $sCountry);
    
    if($bResult) {
        $aLeagues = $oLeagueService->getAllLeagues();

        if($aLeagues) {
            foreach($aLeagues as $key => $value) {
                echo '<tr>';
                    echo '<th scope="col">'.$value['id'].'</th>';
                    echo '<td scope="col">'.$value['name'].'</th>';
                    echo '<td scope="col">'.$value['country'].'</th>';
                    echo '<td scope="col">'.
                                '<a class="editLeague" title="Edytuj"><i class="fa fa-edit text-warning"></i></a>'.
                                '<a class="deleteLeague" title="Usuń"><i class="fa fa-trash text-danger"></i></a>'.
                                '</th>';
                echo '</tr>';
            }
        } else {
            echo '<strong style="color: red; font-size: 14px">Brak lig w bazie danych!</strong>';
        }
    }
}
