<?php

/*******************************************************************************
 * @brief Function returns all articles from user favourite leagues.           *
 * @author Michał                                                              *
 * @date 06.01.2019                                                            *
 ******************************************************************************/

require __DIR__ . '/../../class/service/ArticleService.Class.php';
session_start();
$oService = new ArticleService();

if (isset($_SESSION['userData']['id'])) {
    $user = $_SESSION['userData']['id'];

    $sql = "SELECT  L.NAME FROM user_leagues AS U LEFT 
            JOIN LEAGUE as L ON U.league_id=L.id WHERE
            U.USER_ID=" . $user . " GROUP BY L.NAME";

    $Ligue = $oService->oMySql->otherQuery($sql);

    if ($Ligue) {
        foreach ($Ligue as $key => $value) {
            $Ligues[] = $value["NAME"];
        }


        $sqlarticles = "SELECT A.TITLE, A.CONTENT,C.NAME FROM article "
                . "AS A LEFT JOIN league AS L ON"
                . " A.league_id=L.id LEFT JOIN country AS C "
                . "ON C.ID = L.country_id  WHERE L.name='" . $Ligues[0] . "'";
        $max = sizeof($Ligues);
        $i = 1;
        for ($i; $i < $max; $i++) {
            $sqlarticles .= " || L.name= '" . $Ligues[$i] . "'";
        }

        $Articlesaboutleagues = $oService->oMySql->otherQuery($sqlarticles);

        if ($Articlesaboutleagues) {
            echo json_encode($Articlesaboutleagues);
        } else {
            echo "0";
        }
    } else {
        echo "Problem z sesja";
    }
} else {
    echo "Jak sie tu znalazłes ?";
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/

