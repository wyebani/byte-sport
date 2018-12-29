<nav class="navbar navbar-dark bg-dark navbar-expand">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainmenu">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">

            </li>
        </ul>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#LoginModal" id="login_button" style="margin-left: 15px; margin-right: 15px;">
            Logowanie
        </button>

        <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content" >
                    <div class="modal-header" >
                        <h5 class="modal-title" id="exampleModalLongTitle">Logowanie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="php/functions/login.php">
                            <div class="form-group col-md-6">
                                <label for="username">Nazwa użytkownika</label>
                                <input tpe="text" name="username" class="form-control" id="username" placeholder="Nazwa użytkownika">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Hasło</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Hasło">
                            </div>				
                        </form>
                    </div>
                    <div class="modal-footer">
                        <span class="forgot-password"><a href="#">Zapomniałeś hasła?</a></span>
                        <button type="button" class="btn btn-primary">Zaloguj</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Wyjdź</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registration -->

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegistrationModal" id="registration_button" >
            Rejestracja
        </button>

        <!-- Modal -->
        <div class="modal fade" id="RegistrationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Rejestracja</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="php/functions/register.php">


                            <div class="form-group col-md-6">
                                <label for="ex-surname">Nazwa użytkownika</label>
                                <input type="username" class="form-control" id="ex-surname" placeholder="Nazwa użytkownika">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-email">Email</label>
                                <input type="email" class="form-control" id="ex-email" placeholder="Email">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-password">Hasło</label>
                                <input type="password" class="form-control" id="ex-password" placeholder="Hasło">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-password">Powtórz hasło</label>
                                <input type="password" class="form-control" id="ex-password" placeholder="Hasło">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-name">Imię</label>
                                <input type="text" class="form-control" id="ex-name" placeholder="Imię">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-surname">Nazwisko</label>
                                <input type="text" class="form-control" id="ex-surname" placeholder="Nazwisko">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-date">Data urodzenia</label>
                                <input type="date" class="form-control" id="ex-date" placeholder="Data">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Zarejestruj</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Wyjdź</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

</nav>