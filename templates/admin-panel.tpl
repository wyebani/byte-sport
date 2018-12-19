<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Panel Administratora</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../css/user.css" rel="stylesheet"/>
        <script src="../../javascript/Click_admin.js"></script>
        <script src="../../javascript/jquery.js"></script>
     
         
    </head>
	
    <body>
        
		<header>
			<img src="../../image/banner.jpg" width="100%" height="200" alt="Baner"/>
		</header>
		
        <div id="container">
             <nav>            
                <ul>                     
					<li id="text" margin="0px" >Login: {$smarty.session.userData.username}</li>
					<li id="text">Administrator</li>
					<li id="text">Godzina: 12:38</li>    
				</ul>              
			</nav>
            <aside>
                <a href="../../index.php"> <p class="myButton">Strona Głowna</p> </a>
                <p   class="myButton"  id="_users">Użytkownicy </p>
                <p class="myButton"  id="_league">Liga</p>
                <p class="myButton" id="_teams">Drużyny</p>
                <p class="myButton" id="_match">Spotkania</p>
                <p class="myButton" id="_articles">Artykuły</p>
                <form method="POST" action="logout.php">
					<input type="submit" class="myButton" value="Wyloguj"/>
				</form>
            </aside>
			
            <article>
                <div id="user">
                    <br>
                    <table cellspacing="10">
                        <tr>
                            <td>Wszyscy Użytkownicy:</td>
                            <td>
								<div id="usersList"></div>
                            </td>
                        </tr>
                        <tr>
                            <td> <input type="button" value="Edytuj" id='buttonarticles'/> </td>
                            <td> <input type="button" value="Usuń" id='buttonarticles'/> </td>
                        </tr>
                        <tr>
                            <td>Dodaj Użytkownika:</td>
                            <td>                                <input type="text" value="" class="inputclass"/></td>                                      
                        </tr>       
                        <tr>
                            <td></td>
                            <td>                                <input type="button" value="Dodaj" id='buttonarticles'/></td>
                        </tr>
                        <tr>
                            <td>Aktywacja Użytkownika:</td>
                            <td>                                <input list="not_active_users" name="User"   class="inputclass"/>
                                <datalist id="not_active_users">
									<option value="Małkpa">
									<option value="Zabcia">  
									<option value="Suchy">
                                </datalist>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>                                 <input type="button" value="Aktywuj" id='buttonarticles'/></td>
                        </tr>
                    </table>
                   
                </div>
				
                <div id='league'>                        
                    <table cellspacing="5">
                        <tr>
                            <td>Ligi</td>
                            <td>
								<div id="leaguesList"></div>
                            </td>
                        </tr>
                       
                                                 <tr>
                            <td>                                <input type="button" value="Edytuj" id='buttonarticles'/><td>
                            <td>                                 <input type="button" value="Usuń" id='buttonarticles'/><td>
						</tr>
                        <tr>
                            <td>Dodaj Lige:</td>
                            <td>                                <input type="text" value="" class="inputclass"/></td>                                      
                        </tr>
                        <tr>
                            <td>Flaga Kraju</td>
                            <td>  
                             
                            </td>
                        </tr>    
                        <tr>      
                            <td></td>
                            <td>                                <input type="button" value="Dodaj" id="buttonarticles"/></td>
						</tr>
                    </table>                        
                </div> 
                
                <div id="teams">
                    <br>
                    <table cellspacing="5" >
                        <tr>
                            <td>Wybierz Lige:</td>
                            <td>
								<div id="leaguesList_2"></div>
                            </td>                                     
                        </tr>
                        <td>Drużyna:</td>
                        <td>
							<div id="teamsList"></div>
                        </td>                      
                              <tr>
                            <td>                        <input type="button" value="Edytuj" id='buttonarticles'/><td>
                            <td>                        <input type="button" value="Usuń" id='buttonarticles'/><td>
						</tr>
					
                   
					
                        <tr>
                        <td>Dodaj Drużynę:</td>
                         <td>                           <input type="text" value="" class="inputclass"/></td>     
                        </tr>
                        <tr>
                            <td></td>
                            <td>                        <input type="button" value="Dodaj" id="buttonarticles"/></td>
                        </tr>
                    </table>
                   
                </div>
				
                <div id="match">
                    <table cellspacing="10">
						<tr>
                            <td>Wybierz Lige:</td>
                            <td>
								<input list="chosen_league" name="League" class="inputclass"/>
								<datalist id="chosen_league">
									<option value="Włoska">
									<option value="Angielska">  
									<option value="LOTTO-Ekstraklasa">
									<option value="Gwatemalska">
								</datalist>
                            </td>                                     
                        </tr>
                                    
                        <tr>
                            <td>Wybierz Kolejke:</td>
                            <td>
								<input list="round" name="League_round" class="inputclass"/>
                                <datalist id="round">
									<option value="1">
									<option value="2">  
									<option value="3">
									<option value="4">
                                </datalist>
                            </td>
						</tr>
                                    
                        <tr>
                            <td>Wybierz Spotkanie:</td>
                            <td>
								<input list="chosen_round" name="League_chosen_round" class="inputclass"/>
                                <datalist id="chosen_round">
									<option value="Piast Gliwice - Wisła Kraków">
									<option value="Górnik Zabrze - Gks Katowice">  
									<option value="LKS Spocone Trampki - korkotrampki">      
                                </datalist>
                            </td>
                        </tr>
                        <tr>
                            <td>Gospodarz: </td>
                            <td>                                <input type="number" value="" class="inputclass"/></td>                      
                        </tr>
						
                        <tr>
                            <td>          </td>
                            <td>VS</td>
                        </tr>
						
                        <tr>
                            <td>Gość: </td>
							<td><input type="number" value="" class="inputclass"/></td>
                        </tr>
                          <tr>
                                                        <td><input type="button" value="Usun"id="buttonarticles"/></td>
                                                        <td> <input type="button" value="Dodaj" id="buttonarticles"/></td>
                        </tr>
                    </table>
					
                  
                </div>
				
                <div id="articles">
                    <table cellspacing="5">
						<td>Wybierz Lige:</td>
                        <td>
							<input list="chosen_league" name="League" class="inputclass"/>
                            <datalist id="chosen_league">
								<option value="Włoska">
								<option value="Angielska">  
								<option value="LOTTO-Ekstraklasa">
                                <option value="Gwatemalska">
                            </datalist>
                        </td>
                        <tr>
                            <td>Temat:</td>
                            <td>                                <input type="text" value="" class="inputclass"/></td>
                        </tr>
                        <tr>
                            <td>Treść:</td>
                            <td> 
								<textarea rows="5" cols="30">Wpisz Tutaj swoją treść</textarea>
							</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>                                <input id="buttonarticles" type="submit" value="Dodaj"/></td>                              
                        </tr>
                        <tr>
                            <td>Dodane artykuły: </td>
                            <td>
								<input list="chosen_article" name="articles" class="inputclass"/>
                                <datalist id="chosen_article">
									<option value="RojS czy Reus">
									<option value="Lewandwoski i krecik">  
									<option value="Pogoń Szczecin">
									<option value="Piast na fali">
                                </datalist>
                            </td>                           
                        </tr>
                        <tr>
                            <td></td>
                            <td>                                <input id="buttonarticles" type="submit" value="Usuń" ></td>
                        </tr>
                    </table>
                </div>
            </article>          
        </div>
    </body>
</html>