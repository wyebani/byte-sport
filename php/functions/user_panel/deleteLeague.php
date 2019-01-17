<?php

/*******************************************************************************
* @brief Function for delete favourite league.                                 *
* @author Paweł                                                                *
* @date 16.01.2019                                                             *
*******************************************************************************/

require __DIR__.'/../../class/service/LeagueService.Class.php';

session_start();

$oLeagueService = new LeagueService();
$sLeagueName = $_POST['leagueName'];

if($sLeagueName) {
    $aLeague = $oLeagueService->getLeagueByName($sLeagueName);
    if($aLeague) {
        $sQuery  = 'DELETE FROM `user_leagues` WHERE league_id = '.$aLeague['0']['id'];
        $sQuery .= ' AND user_id = '.$_SESSION['userData']['id'];
        
        echo $oLeagueService->oMySql->otherQuery($sQuery);
    }
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/