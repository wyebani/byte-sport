<?php

/*******************************************************************************
 * @brief Function returns table with all articles                             *
 * @author Marek                                                               *
 * @date 18.12.2018                                                            *
 ******************************************************************************/

require __DIR__.'/../../../class/service/ArticleService.Class.php';
require __DIR__.'/../../../class/service/UserService.Class.php';
require __DIR__.'/../../../class/service/LeagueService.Class.php';

$oArticleService = new ArticleService();
$aArticles = $oArticleService->getAllArticles();

$oUserService = new UserService();
$oLeagueService = new LeagueService();


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

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/