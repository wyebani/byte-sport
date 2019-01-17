<?php

/*******************************************************************************
 * @brief Function returns picker with all leagues                             *
 * @author Marek                                                               *
 * @date 12.12.2018                                                            *
 ******************************************************************************/

require __DIR__.'/../../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();
$aLeagues = $oLeagueService->getAllLeagues();

if($aLeagues) {
    foreach($aLeagues as $key => $value) {
        echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
    }
} else {
    echo '<strong style="color: red; font-size: 14px">Brak lig w bazie danych!</strong>';
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/