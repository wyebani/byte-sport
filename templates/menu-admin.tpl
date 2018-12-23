<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div>
       <h3 class="text-white" style="display: inline;">Zalogowany:</h3>  
       <p class="form-control-static text-white" style="display: inline;">{$smarty.session.userDetails.name} {$smarty.session.userDetails.surname}</p>
    </div>

    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Panel użytkownika</a>
              <a class="dropdown-item" href="#">Moja ulubiona liga</a>
              <a class="dropdown-item" href="admin-login.html">Panel administratora</a>
            </div>
        </li>
    </ul>
    
    <div>
        <form action="php/functions/logout.php" method="post">    
           <input type="submit" name="logout" id="logout-button" class="btn btn-danger" value="Wyloguj">
        </form>
    </div>
</nav>
					
				
				
		