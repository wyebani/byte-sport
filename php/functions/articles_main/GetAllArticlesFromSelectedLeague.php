<?php

require __DIR__ . '/../../class/service/ArticleService.Class.php';

$oService = new ArticleService();

if(isset($_GET["league"]))$league=$_GET['league'];
else $league='Ekstraklasa';//faworyzowanie Ligi Polskiej !!!!

$sql = "SELECT A.TITLE, A.CONTENT,C.NAME FROM article "
        . "AS A LEFT JOIN league AS L ON"
        . " A.league_id=L.id LEFT JOIN country AS C "
        . "ON C.ID = L.country_id  WHERE L.name='".$league."'";
//echo $sql;
$aArticles = $oService->oMySql->otherQuery($sql);


if($aArticles) {
    echo json_encode($aArticles);
            }
        else 
           {
    echo  0;
            }