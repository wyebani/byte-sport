<?php

require __DIR__.'/../../../class/service/MatchService.Class.php';

$oMatchService = new MatchSerice();
$iMatchId = $_POST['id'];
$bResult = false;

if($iMatchId) {
    $bResult = $oMatchService->deleteMatch($iMatchId);
}

echo json_encode($bResult);
