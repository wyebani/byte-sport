<?php

/*******************************************************************************
* @brief Function for delete favourite league.                                 *
* @author Paweł                                                                *
* @date 16.01.2019                                                             *
*******************************************************************************/

require __DIR__.'/../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();
$iLeagueId = $_POST['leagueId'];

if($iLeagueId) {
    $bResult = $oLeagueService->oMySql->delete("user_leagues",
            array('id' => $iLeagueId));            
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/