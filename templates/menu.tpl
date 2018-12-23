<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <form method="post" action="php/functions/logout.php">    
        <input type="submit" id="logout-button" value="Wyloguj"></input>	
    </form>
    <div id="user-menu">
        <ol>
            <li>
                <a href="#">Menu</a>
                <ul>
                    <li><a href="#">Mój Profil</a></li>
                    <li><a href="#">Moja Ulubiona Liga</a></li>
                </ul>
            </li>
        </ol>
    </div>

    <div id="user-name">
        <h3 style="display:inline-block">Zalogowany:</h3>  
        <input type="text" value="{$smarty.session.userDetails.name} {$smarty.session.userDetails.surname}" class="name-surname" readonly ></input>
    </div>
</nav>

					
				
				
	