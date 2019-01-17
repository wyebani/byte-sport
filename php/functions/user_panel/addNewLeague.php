<?php
    session_start();
    require __DIR__.'/../../class/service/LeagueService.Class.php';

    $oLeagueService = new LeagueService();
   
    $sLeagueName = $_POST['chosenLeague'];
    $iUserId = $_SESSION['userDetails']["id"];

     $sQuery = 'SELECT l.id '; 
    $sQuery .= 'FROM `country` as c ';
    $sQuery .= 'INNER JOIN `league` as l ' ;
    $sQuery .= 'ON c.id = l.country_id WHERE c.name = "'.$sLeagueName.'"';
    
      
if($aLeague = $oLeagueService->oMySql->otherQuery($sQuery)){
    $iLeagueID = $aLeague[0]['id'];

    if($aLeague2 = $oLeagueService->oMySql->insert("user_leagues", 
                                array('id' => null,
                                'user_id' => $iUserId,
                                'league_id' => $iLeagueID))){

    echo "Pomyślnie dodano ligę.";
    }
    else echo "Nieudane dodawanie ligi.";
}
else echo "Nieudane dodawanie ligi.";
