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
                 echo "<table class='table table-stripped' text-center>";
                      echo"  <thead>";
                          echo "  <tr>";
                               echo " <th scope='col'>Miejsce</th>";
                               echo " <th scope='col'>Nazwa drużyny</th>";
                                echo "  <th scope='col'>RM</th>";
                                echo "<th scope='col'>BZ</th>";
                               echo "<th scope='col'>BS</th>";
                                echo "<th scope='col'>PKT</th>";
                            echo "</tr>";
                       echo " </thead>";
                       echo " <tbody id='teamTableContent'>";
    
                foreach ($aTeam as $key => $value)
        {
                     echo "  <tr style='text-align: center'>";
         
                               echo "<td scope='col'>".$position."</td>";
                               echo "<td scope='col'>".$value["NAME"]."</td>";
                               $position++;
                        echo "  </tr>";
        }
                       echo "</tbody>";
        
                    echo "</table>";
                    
                    
            }
        else 
            {
                 echo  0;
            }
?>