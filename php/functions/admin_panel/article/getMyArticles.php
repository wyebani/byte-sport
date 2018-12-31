<?php

require __DIR__.'/../../../class/service/ArticleService.Class.php';
require __DIR__.'/../../../class/service/UserService.Class.php';
require __DIR__.'/../../../class/service/LeagueService.Class.php';

session_start();

$oArticleService = new ArticleService();
$oUserService = new UserService();
$oLeagueService = new LeagueService();

$iAdminId = $_SESSION['userData']['id'];
$sQuery  = 'SELECT * FROM `article` ';
$sQuery .= 'WHERE `author_id` = '.$iAdminId;


$aArticles = $oArticleService->oMySql->otherQuery($sQuery);

if($aArticles) {
    foreach($aArticles as $key => $value) {
        echo '<tr>';
                echo '<th scope="col">'.$value['id'].'</th>';
                echo '<td scope="col">'.$value['title'].'</td>';

                $aUser = $oUserService->getUser($value['author_id']);
                echo '<td scope="col">'.$aUser['username'].'</td>';

                $aLeague = $oLeagueService->getLeague($value['league_id']);
                echo '<td scope="col">'.$aLeague['name'].'</td>';
                echo '<td scope="col">'.$value['date'].'</td>';
                echo '<td scope="col">'.
                            '<a class="editArticle" title="Edytuj"><i class="fas fa-edit text-warning"></i></a>'.
                            '<a class="deleteArticle" title="Usuń"><i class="fas fa-trash text-danger"></i></a>'.
                     '</th>';
            echo '</tr>';
    }
}