<?php

require __DIR__.'/../../class/service/ArticleService.Class.php';

$oService = new ArticleService();
$aArticles = $oService->getAllArticles();
$size=sizeof($aArticles);
echo $size;
