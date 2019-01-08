<?php
require __DIR__ . '/../class/service/TeamService.Class.php';

$oService = new TeamService();

    if(isset($_GET["league"]))$league=$_GET['league'];

    else $league='Ekstraklasa';//faworyzowanie Ligi Polskiej !!!!

$sql = "SELECT T.NAME FROM TEAM AS T LEFT JOIN LEAGUE AS L ON T.league_id=L.id WHERE L.NAME='".$league."'";
//echo $sql;
$aTeam = $oService->oMySql->otherQuery($sql);
$position = 1;//League position 

if($aTeam) 
            {
                 
                foreach ($aTeam as $key => $value)
        {
                     echo "  <tr style='text-align: center'>";
         
                               echo "<td scope='col'>".$position."</td>";
                               echo "<td scope='col'>".$value["NAME"]."</td>";
                               $position++;
                        echo "  </tr>";
        }
                    
                    
                    
            }
        else 
            {
                  echo "Brak drużyn dla danej ligi";
            }
?>