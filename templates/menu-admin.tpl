<div id="menu-bar">
    <form action="php/functions/logout.php" method="post">    
        <input type="submit" id="logout-button" value="Wyloguj"></input>	
    </form>	
    <div id="user-menu">
        <ol>
            <li>
                <a href="#">Menu</a>
                <ul>
                    <li><a href="#">Mój Profil</a></li>
                    <li><a href="#">Moja Ulubiona Liga</a></li>
                    <li><a href="admin-login.html">Panel Administratora</a></li>
                </ul>
            </li>
        </ol>
    </div>

    <div id="user-name">
        <h3 style="display:inline-block">Zalogowany:</h3>  
        <input type="text" value="{$smarty.session.userDetails.name} {$smarty.session.userDetails.surname}" class="name-surname" readonly ></input>
    </div>
</div>

					
				
				
		