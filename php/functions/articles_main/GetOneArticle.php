

<?php

require __DIR__.'/../../class/service/ArticleService.Class.php';

$oService = new ArticleService();

if(isset($_POST['id']))
    {
    
$id=$_POST['id'];


$aArticles = $oService->getArticle($id);
    if($aArticles) {
        ?>
 
         <div id="avatar">
                    <img src="image/avatar.png" width="100" height="100" alt="avatar"/>
            </div>
                <!-- Tutaj bedzie trzeba dodac nowe zapytanie do bazy zeby wyciagnac nazwe ligi i podmienic img -->
            <div id="description">
                    <h1><?php echo $aArticles['title'] ?></h1>
                    <?php echo $aArticles['content'] ?>
                   
            </div>
    <?php
} else {
    echo '<strong style="color: red; font-size: 14px">Brak artykułu w bazie danych!</strong>';
}
    }
else
       {
  echo"Podaj Id";
    
       }


?>