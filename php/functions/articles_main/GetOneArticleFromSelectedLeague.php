

<?php

require __DIR__.'/../../class/service/ArticleService.Class.php';

$oService = new ArticleService();

if(isset($_POST['id'])) {
    $id=$_POST['id'];


    $aArticles = $oService->getArticle($id);
        if($aArticles) {
            echo '<div id="avatar">';
                echo '<img src="image/avatar.png" width="100" height="100" alt="avatar"/>';
            echo '</div>';
                    // Tutaj bedzie trzeba dodac nowe zapytanie do bazy zeby wyciagnac nazwe ligi i podmienic img
            echo '<div id="description">';
                echo '<h1>'.$aArticles['title'].'</h1>';
                echo $aArticles['content'];       
            echo '</div>';

    } else {
        echo '<strong style="color: red; font-size: 14px">Brak artykułu w bazie danych!</strong>';
    }
}

