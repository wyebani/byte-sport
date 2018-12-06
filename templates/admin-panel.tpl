<!DOCTYPE html>

<html>
    <head>
        <title>Serwis "Byte Sport"</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../css/user.css" rel="stylesheet"/>
        <script src="javascript/jquery.js"></script>
	<script src="javascript/popup.js"></script>
        <script src="javascript/script.js" async></script>
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
        <link href="fonts/lato/Lato-Light.ttf"/>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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
            <p class="myButton" >Użytkownicy </p>
            <p class="myButton">Liga</p>
            <p class="myButton">Drużyny</p>
            <p class="myButton">Spotkania</p>
            <p class="myButton">Artykuły</p>
            <form method="POST" action="logout.php">
                <input type="submit" class="myButton" value="Wyloguj"/>
            </form>
        </aside>
		
        <article>
            <div id="Users">
                <br>
                <table>
                    <tr>
                        <td>Wszyscy Użytkownicy</td>
                        <td>
							<input list="All_users" name="User"   class="inputclass"/>
                            <datalist id="All_users">
								<option value="Stefan">
								<option value="Dzikibezczarny">  
								<option value="Bolek">
                            </datalist>
                        </td>
                    </tr>
                    <tr>
                       
                    </tr>
                </table>
				<td><input type="button" value="Edytuj"class="inputbutton"/></td>
				<input type="button" value="Usuń"class="inputbutton"/>
                <br>
                <br>
                <table>
                    <tr>
                        <td>Dodaj Użytkownika:</td>
                        <td><input type="text" value="" class="inputclass"/></td>                                      
                    </tr>                                   
                </table>
                <input type="submit" value="Dodaj" id="add_button"/>
            </div>
			
            <div id='league'>                        
                <table cellspacing="10">
                    <tr>
                        <td>Ligi</td>
                        <td>
							<input list="All_league" name="League" class="inputclass"/>
                            <datalist id="All_league">
								<option value="Włoska">
								<option value="Angielska">  
								<option value="LOTTO-Ekstraklasa">
								<option value="Gwatemalska">
                            </datalist>
                        </td>
                    </tr>
                   
                    <tr>
                        <td><input type="button" value="Edytuj" id='buttonarticles'/><td>
                        <td><input type="button" value="Usuń" id='buttonarticles'/><td>
					</tr>
                    <tr>
                        <td>Dodaj Lige:</td>
                        <td><input type="text" value="" class="inputclass"/></td>                                      
                    </tr>
                    <tr>
                        <td>Flaga Ligi</td>
                        <td> <input type="image" value="Image" class='inputclass'/></td>
                    </tr>    
                    <tr>              
                        <td> <input type="submit" value="Dodaj" id="buttonarticles"/></td>
					</tr>
                </table>                        
            </div> 
            
            <div id="teams">
                <br>
                <table  id="the_same_table">
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
                    <td>Drużyna:</td>
                    <td>
						<input list="team" name="Teams" class="inputclass"/>
                        <datalist id="team">
							<option value="Druzyna123">
							<option value="Druzyna1">  
							<option value="Druzyna2">
                            <option value="Druzyna3">
                        </datalist>
                    </td>                      
                </table>
				
                <input type="button" value="Edytuj"class="inputbutton"/>
                <input type="button" value="Usuń"class="inputbutton"/>
				
                <table id="the_same_table">
                    <td>Dodaj Drużynę:</td>
                     <td><input type="text" value="" class="inputclass"/></td>                                                                         
                </table>
                <input type="submit" value="Dodaj" id="add_button"/>
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
                        <td><input type="number" value="" class="inputclass"/></td>                      
                    </tr>
					
                    <tr>
                        <td>          </td>
                        <td>VS</td>
                    </tr>
					
                    <tr>
                        <td>Gość: </td>
						<td><input type="number" value="" class="inputclass"/></td>
                    </tr>                                        
                </table>
				
                <input type="button" value="Usun"class="inputbutton"/>
                <input type="submit" value="Dodaj"class="inputbutton"/>
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
                        <td><input type="text" value="" class="inputclass"/></td>
                    </tr>
                    <tr>
                        <td>Treść:</td>
                        <td> 
							<textarea rows="5" cols="30">Wpisz Tutaj swoją treść</textarea>
						</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input id="buttonarticles" type="submit" value="Dodaj"/></td>                              
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
                        <td><input id="buttonarticles" type="submit" value="Usuń" ></td>
                    </tr>
                </table>
            </div>
        </article>          
    </div>
    </body>
</html>
