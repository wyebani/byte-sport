<?php

require __DIR__.'/../../../class/service/ArticleService.Class.php';

$oArticleService = new ArticleService();
$iArticleId = $_POST['articleId'];
$bResult = false;

if($iArticleId) {
    $bResult = $oArticleService->deleteArticle($iArticleId);
}

echo json_encode($bResult);
