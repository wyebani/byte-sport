<?php

/*******************************************************************************
 * @brief Function deletes article                                             *
 * @author Marek                                                               *
 * @date 18.12.2018                                                            *
 ******************************************************************************/

require __DIR__.'/../../../class/service/ArticleService.Class.php';

$oArticleService = new ArticleService();
$iArticleId = $_POST['articleId'];
$bResult = false;

if($iArticleId) {
    $bResult = $oArticleService->deleteArticle($iArticleId);
}

echo json_encode($bResult);

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/