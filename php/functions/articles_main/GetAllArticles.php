<?php

require __DIR__ . '/../../class/service/ArticleService.Class.php';

$oService = new ArticleService();
$sql = "SELECT A.title, A.content,C.name "
        . "FROM article AS A LEFT JOIN league"
        . " AS L ON A.league_id=L.id LEFT JOIN"
        . " country AS C ON C.ID = L.country_id";
//echo $sql;
$aArticles = $oService->oMySql->otherQuery($sql);

if ($aArticles) {
    echo json_encode($aArticles);
} 
