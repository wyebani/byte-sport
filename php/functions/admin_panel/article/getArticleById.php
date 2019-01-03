<?php

require __DIR__.'/../../../class/service/ArticleService.Class.php';
require __DIR__.'/../../../class/service/UserService.Class.php';

$iArticleId = $_GET['articleId'];

if($iArticleId) {
    $oUserService = new UserService();
    $oArticleService = new ArticleService();
    $aArticleData = $oArticleService->getArticle($iArticleId);
    
    if($aArticleData) {
        $aDTO = array();
        $aDTO['id'] = $aArticleData['id'];
        $aDTO['title'] = $aArticleData['title'];
        $aDTO['content'] = $aArticleData['content'];
        
        $aUserData = $oUserService->getUser($aArticleData['author_id']);
        $aDTO['author_id'] = $aUserData['id'];
        $aDTO['author_name'] = $aUserData['username'];
        $aDTO['date'] = $aArticleData['date'];
        
        echo json_encode($aDTO);
    } else { 
        echo json_encode('Błąd podczas komunikacji z bazą danych');
    }
} else {
    echo json_encode('Wystąpił nieoczekiwany błąd');
}

