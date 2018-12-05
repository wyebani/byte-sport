 <div id="menu-bar">
    <input type="button" id="login-button"  href="" class="open-window" data-okienkoId="#popup-login" value="Zaloguj"></input>
	<div id="popup-login" class="window-base">
		<div class="window-inside">
			<span class="window-close">&times;</span>
			<h1>Logowanie<h1><br>
	
			<div id="logowanie">
				<form method="post" action="php/functions/login.php">
					<label for="username">Nazwa użytkownika:</label>
					<input type="text" id="username" name="username">
					<label for="password">Hasło:</label>
					<input type="password" id="password" name="password">
					<br><br>
							
					<input type="submit" value="Zaloguj">
						
					<div id="forgot-exit">	
						<button class="cancel-button">Wyjdź</a></button>
						<span class="forgot-password"><a href="#">Zapomniałeś hasła?</a></span>
					</div>
				</form>
			</div>
		</div>
	</div>


    <input type="button" id="registration-button" value="Rejestruj" href="" class="open-window" data-okienkoId="#popup-registration"> </input>				
	<div id="popup-registration" class="window-base">
		<div class="window-inside2">
			<span class="window-close">&times;</span>
			<h1>Rejestracja<h1>
	
			<div id="registration">
				<form method="post" action="php/functions/register.php">
					<label for="username">Nazwa użytkownika:</label>
					<input type="text" id="username" name="username" placeholder=" Nazwa użytkownika">
					
					<label for="email">Email:</label>
					<input type="text" id="email" name="email" placeholder="E-mail">
					
					<label for="password">Hasło:</label>
					<input type="password" id="password" name="password" placeholder="Hasło">
					
					<label for="repeat_passord">Powtórz hasło:</label>						
					<input type="passord" id="repeat_passord" name="repeat_passord" placeholder="Powtórz hasło">
					
					<label for="name">Imie:</label>
					<input type="text" id="name" name="name" placeholder="Imie">
					
					<label for="surname">Nazwisko:</label>
					<input type="text" id="surname" name="surname" placeholder="Nazwisko">
					
					<label for="date_of_birth">Data Urodzenia:</label>
					<input type="date" id="date_of_birth" name="date_of_birth" value="2018-01-01" min="1950-01-01" max="2020-01-31">
					
					
					<br><br>
					<input type="submit" value="Zarejestruj się">
				</form>
			</div>
		</div>
	</div>
</div>