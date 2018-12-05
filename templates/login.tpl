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
					<input type="password" id="password2" name="password">
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