<?php

/*******************************************************************************
 * @brief Function returns all articles from selected league.                  *
 * @author Michał                                                              *
 * @date 06.01.2019                                                            *
 ******************************************************************************/

require __DIR__ . '/../../class/service/ArticleService.Class.php';

$oService = new ArticleService();

if (isset($_GET["league"]))
    $league = $_GET['league'];


$sql = "SELECT A.TITLE, A.CONTENT,C.NAME FROM article "
        . "AS A LEFT JOIN league AS L ON"
        . " A.league_id=L.id LEFT JOIN country AS C "
        . "ON C.ID = L.country_id  WHERE L.name='" . $league . "'";
$aArticles = $oService->oMySql->otherQuery($sql);

if ($aArticles) {
    echo json_encode($aArticles);
} else {
    echo 0;
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/