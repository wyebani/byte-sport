<nav class="navbar navbar-dark bg-dark navbar-expand-md">


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainmenu">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">

            </li>

        </ul>

        <form class="form-inline">

            <ul class="nav navbar-nav" style="margin-right:10px">

                <li class="nav-item" style="margin-right:50px;">
                    <h4 style="display:inline-block; color:white">Zalogowany:</h4>  
                    <input type="text" value="{$smarty.session.userDetails.name} {$smarty.session.userDetails.surname}" class="name-surname" readonly ></input>
                </li>
                <div class="dropdown-divider"></div>

                <li class="nav-item dropdown" style="margin-right:50px;">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false" id="submenu" aria-haspopup="true"> Menu </a>

                    <div class="dropdown-menu" aria-labelledby="submenu">

                        <a class="dropdown-item" href="#"> Mój profil </a>
                        <a class="dropdown-item" href="#"> Moja ulubiona Liga </a>
                    </div>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item" >
                    <form method="post" action="php/functions/logout.php">    
                        <button type="submit" class="btn btn-danger" data-toggle="modal"  id="logaut_button" >Wyloguj</button>
                    </form>
                </li>
            </ul>

        </form>

    </div>

</nav>