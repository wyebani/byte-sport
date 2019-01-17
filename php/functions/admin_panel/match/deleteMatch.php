<?php

/*******************************************************************************
 * @brief Function delete match by id                                          *
 * @author Marek                                                               *
 * @date 02.12.2018                                                            *
 ******************************************************************************/

require __DIR__.'/../../../class/service/MatchService.Class.php';

$oMatchService = new MatchSerice();
$iMatchId = $_POST['id'];
$bResult = false;

if($iMatchId) {
    $bResult = $oMatchService->deleteMatch($iMatchId);
}

echo json_encode($bResult);

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/