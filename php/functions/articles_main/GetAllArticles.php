<?php

require __DIR__ . '/../../class/service/ArticleService.Class.php';

$oService = new ArticleService();
$aArticles = $oService->getAllArticles();

if ($aArticles) {
    echo json_encode($aArticles);
} 
