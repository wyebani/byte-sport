<?php
/* Smarty version 3.1.33, created on 2018-12-31 11:50:00
  from 'D:\xampp\htdocs\byte-sport\templates\notlogged-menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c29f458b1dd77_73172577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf50303d87747cd517c6dc203537edb97141753d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\byte-sport\\templates\\notlogged-menu.tpl',
      1 => 1546253396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c29f458b1dd77_73172577 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-dark bg-dark navbar-expand">

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

                        <form method="post" action="php/functions/login.php" data-toggle="validator" novalidate="true">
                            <div class="form-group col-md-6">
                                <label for="username">Nazwa użytkownika</label>
                                <input tpe="text" name="username" class="form-control" id="username" placeholder="Nazwa użytkownika" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Hasło</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Hasło" required>

                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Zaloguj</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Wyjdź</button>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <span class="forgot-password"><a href="#">Zapomniałeś hasła?</a></span>
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

                        <form method="" role="form" action="" id="registerForm" data-toggle="validator" novalidate="true">


                            <div class="form-group col-md-6">
                                <label for="ex-username">Nazwa użytkownika</label>
                                <input type="text" class="form-control" id="ex-username" name="username" value="" placeholder="Nazwa użytkownika" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-email">Email</label>
                                <input type="email" class="form-control" id="ex-email" name="email" placeholder="Email" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-password">Hasło</label>
                                <input type="password" class="form-control" id="ex-password"  name="password" placeholder="Hasło" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-password">Powtórz hasło</label>
                                <input type="password" class="form-control" id="ex-passwordConfirm" placeholder="Hasło" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-name">Imię</label>
                                <input type="text" class="form-control" id="ex-name" name="name" placeholder="Imię" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-surname">Nazwisko</label>
                                <input type="text" class="form-control" id="ex-surname" name="surname" placeholder="Nazwisko" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ex-date">Data urodzenia</label>
                                <input type="date" class="form-control" id="ex-dateOfBirth" name="date_of_birth" placeholder="Data" required>
                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Zarejestruj</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Wyjdź</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

</nav><?php }
}
