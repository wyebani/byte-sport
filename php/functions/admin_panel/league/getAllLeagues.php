<?php

require __DIR__.'/../../../class/service/LeagueService.Class.php';
require __DIR__.'/../../../class/service/CountryService.Class.php';

$oCountryService = new CountryService();
$oLeagueService = new LeagueService();
$aLeagues = $oLeagueService->getAllLeagues();

if($aLeagues) {
    foreach($aLeagues as $key => $value) {
        echo '<tr>';
            echo '<th scope="col">'.$value['id'].'</th>';
            echo '<td scope="col">'.$value['name'].'</th>';
            $aCountryData = $oCountryService->getCountry($value['country_id']);
            echo '<td scope="col">'.$aCountryData['name'].'</th>';
            echo '<td scope="col">'.
                        '<a class="editLeague" title="Edytuj"><i class="fas fa-edit text-warning"></i></a>'.
                        '<a class="deleteLeague" title="Usuń"><i class="fas fa-trash text-danger"></i></a>'.
                 '</th>';
        echo '</tr>';
    }
} else {
    echo '<strong style="color: red; font-size: 14px">Brak lig w bazie danych!</strong>';
}