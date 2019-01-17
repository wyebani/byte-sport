<?php

/*******************************************************************************
 * @brief Function deletes league                                              *
 * @author Marek                                                               *
 * @date 12.12.2018                                                            *
 ******************************************************************************/

require __DIR__.'/../../../class/service/LeagueService.Class.php';

$oLeagueService = new LeagueService();
$iLeagueId = $_POST['leagueId'];

if($iLeagueId) {
    $bResult = $oLeagueService->deleteLeague($iLeagueId);
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/