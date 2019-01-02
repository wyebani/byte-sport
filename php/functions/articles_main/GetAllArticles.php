<?php

require __DIR__ . '/../../class/service/ArticleService.Class.php';

$oService = new ArticleService();
$aArticles = $oService->getAllArticles();
$size=sizeof($aArticles);


if($aArticles) {
  echo json_encode($aArticles);
            }
        else 
           {
    echo  0;
            }