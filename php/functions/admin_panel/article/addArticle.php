<?php

/*******************************************************************************
 * @brief Function add article                                                 *
 * @author Marek                                                               *
 * @date 18.12.2018                                                            *
 ******************************************************************************/

require __DIR__.'/../../../class/service/ArticleService.Class.php';

session_start();

$iAdminId = $_SESSION['userData']['id'];

if($iAdminId) {
    if(empty($_POST['title'])) {
        echo json_encode('Uzupełnij tytuł!');
        return;
    }
    if(!isset($_POST['leagueId'])) {
        echo json_encode('Wybierz ligę!');
        return;
    }
    if(empty($_POST['content'])) {
        echo json_encode('Uzupełnij treść artykułu!');
        return;
    }
    
    $oArticleService = new ArticleService();
    $aArticleData = array();
    
    $aArticleData['title'] = $_POST['title'];
    $aArticleData['league_id'] = $_POST['leagueId'];
    $aArticleData['author_id'] = $iAdminId;
    $aArticleData['content'] = $_POST['content'];
    $aArticleData['date'] = date("Y-m-d H:i:s"); 
    
    $iArticleId = $oArticleService->addNewArticle($aArticleData);
    
    if($iArticleId) {
        echo json_encode(true);
    } else {
        echo json_encode('Nie udało się dodać artykułu. Spróbuj poźniej.');
    }
    
} else {
    echo json_encode('Musisz być zalogowany aby dodać artykuł!');
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/