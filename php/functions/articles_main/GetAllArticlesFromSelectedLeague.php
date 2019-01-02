<?php

require __DIR__ . '/../../class/service/ArticleService.Class.php';

$oService = new ArticleService();

if(isset($_GET["league"]))$league=$_GET['league'];
else $league='Ekstraklasa';//faworyzowanie Ligi Polskiej !!!!

$sql = "SELECT A.ID, A.TITLE, A.CONTENT,"
        . " L.NAME FROM article AS A LEFT JOIN "
        . "league AS L ON A.league_id=L.id "
        . "WHERE L.name='".$league."'";
//echo $sql;
$aArticles = $oService->oMySql->otherQuery($sql);


if($aArticles) {
    echo json_encode($aArticles);
            }
        else 
           {
    echo  0;
            }