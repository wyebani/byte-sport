<?php

require __DIR__.'/../../../class/service/CountryService.Class.php';

$oCountryService = new CountryService();
$aCountries = $oCountryService->getAllCountries();

if($aCountries) {
    foreach($aCountries as $key => $value) {
        echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
    }
} else {
    echo '<strong style="color: red; font-size: 14px">Brak lig w bazie danych!</strong>';
}
