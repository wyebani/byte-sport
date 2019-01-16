<?php
/* Smarty version 3.1.33, created on 2019-01-16 19:36:44
  from 'D:\xampp\htdocs\byte-sport\templates\admin-panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3f79bca893b5_20103610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3288c3394ee3067fec5c72127cef14a7f42e486e' => 
    array (
      0 => 'D:\\xampp\\htdocs\\byte-sport\\templates\\admin-panel.tpl',
      1 => 1547394240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3f79bca893b5_20103610 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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

        <!-- Bootstrap -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css"/>
        <?php echo '<script'; ?>
 src="../../javascript/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../bootstrap/js/popper.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../bootstrap/js/bootstrap-validator.js"><?php echo '</script'; ?>
>

        <!-- Font-awesome icons -->
        <link rel="stylesheet" href="../../fontawesome/css/all.css"/>

        <!-- Side menu styles -->
        <link rel="stylesheet" href="../../css/admin.css"/>

        <!-- Admin panel scripts -->
        <?php echo '<script'; ?>
 src="../../javascript/admin-panel.js"><?php echo '</script'; ?>
>

    </head>

    <body>
        <div class="container">
            <header>
                <img src="../../image/banner.jpg" width="100%" height="200" alt="Baner"/>
            </header>

            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Panel Administratora</h3>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="#users" id="usersBtn" data-toggle="collapse">
                            Użytkownicy
                        </a>
                    </li>
                    <li>
                        <a href="#leagues" id="leaguesBtn" data-toggle="collapse">
                            Ligi
                        </a>
                    </li>
                    <li>
                        <a href="#teams" id="teamsBtn" data-toggle="collapse">
                            Drużyny
                        </a>
                    </li>
                    <li>
                        <a href="#matches" id="matchesBtn" data-toggle="collapse">
                            Spotkania
                        </a>
                    </li>
                    <li>
                        <a href="#articles" id="articlesBtn" data-toggle="collapse">
                            Artykuły
                        </a>
                    </li>
                    <li>
                        <a href="../../index.php" id="exitBtn">
                            Wyjście
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content -->
            <div id="content">

                <!-- Users -->
                <div id="users" class="collapse">
                    <h3>Lista użytkowników</h3>
                    <br>
                    <form id="addUserForm" data-toggle="validator" novalidate="true">
                        <input type="text" name="username" id="username" placeholder="Nazwa użytkownika" value="" style="height: 39px;" required />  
                        <input type="email" name="email" id="email" placeholder="Adres email" value="" style="height: 39px;" required />  
                        <input type="submit" name="addUser-submit" id="addUser-submit" class="btn btn-success" value="Dodaj nowego użytkownika">
                    </form>
                    <br>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nazwa użytkownika</th>
                                <th scope="col">Imie</th>
                                <th scope="col">Nazwisko</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="usersTableContent">
                        </tbody>
                    </table>

                    <!-- Modal for edit user -->
                    <div class="modal fade bd-example-modal-lg" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Edycja użytkownika</h4>
                                </div>

                                <form id="editUserForm" data-toggle="validator" role="form" method="POST">
                                    <br>
                                    <input type="hidden" id="userId_edit" name="userId" value=""/>

                                    <div class="form-group row">
                                        <label for="username" class="col-md-4 col-form-label text-md-right">Nazwa użytkownika:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="username_edit" class="form-control" name="username" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Imie:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="name_edit" class="form-control" name="name" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="surname_edit" class="form-control" name="surname" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>
                                        <div class="col-md-6">
                                            <input type="email" id="email_edit" class="form-control" name="email" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dateOfBirth" class="col-md-4 col-form-label text-md-right">Data urodzenia:</label>
                                        <div class="col-md-6">
                                            <input type="date" id="date_of_birth_edit" class="form-control" name="date_of_birth" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="newPassword" class="col-md-4 col-form-label text-md-right">Zmień hasło:</label>
                                        <div class="col-md-6">
                                            <input type="password" id="new_password_edit" class="form-control" name="new_password" data-minlength="6">
                                            <div class="help-block">Minimalna długość hasła 6 znaków</div>
                                        </div>

                                        <label for="passworConfirm" class="col-md-4 col-form-label text-md-right">Potwierdź hasło:</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password_confirm_edit" class="form-control" name="password_confirm"
                                                   data-match="#new_password" data-match-error="Podane hasła rożnią się">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="display: inline;">
                                        <input type="checkbox" class="form-check-input" id="permissions_edit">
                                        <label class="form-check-label" for="permissions_edit">Administrator</label>     

                                        <input type="checkbox" class="form-check-input" id="active_edit">
                                        <label class="form-check-label" for="active">Aktywny</label>
                                    </div>


                                    <div class="modal-footer">
                                        <input type="submit" id="editUserForm-submit" class="btn btn-success" value="Zapisz"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>            
                </div>

                <!-- Leagues -->
                <div id="leagues" class="collapse">
                    <h3>Ligi</h3>
                    <br>
                    <form id="addLeagueForm" data-toggle="validator" novalidate="true">
                        <input type="text" name="league_name" id="league_name" placeholder="Nazwa ligi" value="" style="height: 39px;" required />  
                        <select id="countryPicker" class="form-control" style="width: 130px; display: inline;" required>                           
                        </select>
                        <input type="submit" name="addLeague-submit" id="addLeague-submit" class="btn btn-success" value="Dodaj nową ligę">
                    </form>
                    <br>
                    <table class="table table-stripped text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nazwa ligi</th>
                                <th scope="col">Kraj</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="leagueTableContent">
                        </tbody>
                    </table>

                    <div class="modal fade bd-example-modal-lg" id="editLeagueModal" tabindex="-1" role="dialog" aria-labelledby="editLeague" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Edycja ligi</h4>
                                </div>

                                <form id="editLeagueForm" data-toggle="validator" role="form" method="POST">
                                    <br>
                                    <input type="hidden" id="leagueId_edit" name="leagueId" value=""/>

                                    <div class="form-group row">
                                        <label for="leagueName_edit" class="col-md-4 col-form-label text-md-right">Nazwa ligi:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="leagueName_edit" class="form-control" name="leaguneName" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="leagueCountry_edit" class="col-md-4 col-form-label text-md-right">Kraj: </label>
                                        <select id="leagueCountry_edit" class="form-control" style="width: 130px; display: inline; margin-left: 14px;" required>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label for="organizer_edit" class="col-md-4 col-form-label text-md-right">Założyciel: </label>
                                        <div class="col-md-6">
                                            <input type="text" id="organizer_edit" class="form-control" name="leagueOrganizer" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="date_of_found_edit" class="col-md-4 col-form-label text-md-right">Data założenia: </label>
                                        <div class="col-md-6">
                                            <input type="date" id="date_of_found_edit" class="form-control" name="date_of_found" value="">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="submit" id="editLeagueForm-submit" class="btn btn-success" value="Zapisz"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Teams -->
                <div id="teams" class="collapse">
                    <h3>Lista drużyn</h3>
                    <br>
                    <form id="addTeamForm" data-toggle="validator" novalidate="true">
                        <input type="text" name="team_name" id="team_name" placeholder="Nazwa drużyny" value="" style="height: 39px;" required />
                        <select id="leaguePicker" class="form-control" style="width: 130px; display: inline;">
                        </select>
                        <input type="submit" name="addTeam-submit" id="addTeam-submit" class="btn btn-success" value="Dodaj nową drużynę">
                    </form>
                    <br>
                    <table class="table table-stripped text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nazwa drużyny</th>
                                <th scope="col">Nazwa ligi</th>
                                <th scope="col">Kraj</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="teamTableContent">
                        </tbody>
                    </table>

                    <!-- Edit team -->
                    <div class="modal fade bd-example-modal-lg" id="editTeamModal" tabindex="-1" role="dialog" aria-labelledby="editTeam" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Edycja drużyny</h4>
                                </div>
                                <form id="editTeamForm" data-toggle="validator" role="form" method="POST">
                                    <br>
                                    <input type="hidden" id="teamId_edit" name="teamId" value=""/>

                                    <div class="form-group row">
                                        <label for="teamName_edit" class="col-md-4 col-form-label text-md-right">Nazwa drużyny: </label>
                                        <div class="col-md-6">
                                            <input type="text" id="teamName_edit" class="form-control" name="teamName" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="teamLeague_edit" class="col-md-4 col-form-label text-md-right">Liga: </label>
                                        <select id="teamLeague_edit" class="form-control" style="width: 130px; display: inline; margin-left: 14px;" required>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label for="teamGround_edit" class="col-md-4 col-form-label text-md-right">Stadion: </label>
                                        <div class="col-md-6">
                                            <input type="text" id="teamGround_edit" class="form-control" name="teamGround" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="teamCoach_edit" class="col-md-4 col-form-label text-md-right">Trener: </label>
                                        <div class="col-md-6">
                                            <input type="text" id="teamCoach_edit" class="form-control" name="teamCoach" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="teamWebsite_edit" class="col-md-4 col-form-label text-md-right">Strona internetowa: </label>
                                        <div class="col-md-6">
                                            <input type="text" id="teamWebsite_edit" class="form-control" name="teamWebsite" value="">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="submit" id="editTeamForm-submit" class="btn btn-success" value="Zapisz"/>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Matches -->
                <div id="matches" class="collapse">
                    <nav>
                        <div class="nav nav-tabs" id="maches-submenu" role="tablist">                          
                            <a class="nav-item nav-link active" id="upcomingMatchesBtn" data-toggle="tab" href="#upcomingMatches"
                               role="tab" aria-controls="nav-allMatches" aria-selected="true">Nadchodzące spotkania</a>

                            <a class="nav-item nav-link" id="ongoingMatchesBtn" data-toggle="tab" href="#ongoingMatches"
                               role="tab" aria-controls="nav-ongoing" aria-selected="false">Trwające spotkania</a>

                            <a class="nav-item nav-link" id="finishedMatchesBtn" data-toggle="tab" href="#finishedMatches"
                               role="tab" aria-controls="nav-finished" aria-selected="false">Zakończone spotkania</a>

                            <a class="nav-item nav-link" id="addMatchBtn" data-toggle="tab" href="#addMatch"
                               role="tab" aria-controls="nav-add" aria-selected="false">Dodaj spotkanie</a>
                        </div>
                    </nav>
                    <br>
                    <div class="tab-content" id="nav-matchContent">                        
                        <div id="upcomingMatches" class="tab-pane fade show active" role="tabpanel" aria-labelledby="upcomingMatchesBtn">
                            <h3>Nadchodzące spotkania</h3>
                            <br>
                            <table class="table table-stripped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Gospodarz</th>
                                        <th scope="col">Gość</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Sezon</th>
                                        <th scope="col">Liga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="upcomingMatchesTableContent">
                                </tbody>
                            </table>
                        </div>

                        <div id="ongoingMatches" class="tab-pane fade" role="tabpanel" aria-labelledby="ongoingMatchesBtn">
                            <h3>Trwające spotkania</h3>
                            <br>
                            <table class="table table-stripped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Gospodarz</th>
                                        <th scope="col">Gość</th>
                                        <th scope="col">Wynik</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Sezon</th>
                                        <th scope="col">Liga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="ongoingMatchesTableContent">
                                </tbody>
                            </table>
                        </div>

                        <div id="finishedMatches" class="tab-pane fade" role="tabpanel" aria-labelledby="finishedMatches">
                            <h3>Zakończone spotkania</h3>
                            <br>
                            <table class="table table-stripped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Gospodarz</th>
                                        <th scope="col">Gość</th>
                                        <th scope="col">Wynik</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Sezon</th>
                                        <th scope="col">Liga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="finishedMatchesTableContent">
                                </tbody>
                            </table>
                        </div>

                        <div id="addMatch" class="tab-pane fade" role="tabpanel" aria-labelledby="addMatch">       
                            <h3>Dodaj spotkanie</h3>
                            <br>
                            <form id="addMatch-form" data-toggle="validator" role="form" method="POST">
                                <br>
                                <div class="form-group row">
                                    <label for="matchLeaguePicker" class="col-md-4 col-form-label text-md-right">Liga: </label>
                                    <div class="col-md-6">
                                        <select id="matchLeaguePicker" class="form-control" onchange="changeLeague()" style="width: 180px; display: inline; margin-left: 14px;" required>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="matchStatusPicker" class="col-md-4 col-form-label text-md-right">Status: </label>
                                    <div class="col-md-6">
                                        <select id="matchStatusPicker" class="form-control" onchange="chagneStatus()" style="width: 180px; display: inline; margin-left: 14px;" required>
                                            <option value="1">Nadchodzące</option>
                                            <option value="2">Trwające</option>
                                            <option value="3">Zakończone</option>
                                            <option value="4">Odwołane</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="matchHostPicker" class="col-md-4 col-form-label text-md-right">Gospodarz: </label>
                                    <div class="col-md-6">
                                        <select id="matchHostPicker" class="form-control" style="width: 180px; display: inline; margin-left: 14px;" required>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="matchGuestPicker" class="col-md-4 col-form-label text-md-right">Gość: </label>
                                    <div class="col-md-6">
                                        <select id="matchGuestPicker" class="form-control" style="width: 180px; display: inline; margin-left: 14px;" required>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="matchResult" class="col-md-4 col-form-label text-md-right">Wynik: </label>
                                    <div class="col-md-6">
                                        <input type="text" id="matchResult" class="form-control" name="matchResult" value="" style="width: 180px; display: inline; margin-left: 14px;" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="matchSeason" class="col-md-4 col-form-label text-md-right">Sezon: </label>
                                    <div class="col-md-6">
                                        <input type="text" id="matchSeason" class="form-control" name="matchSeason" value="" style="width: 180px; display: inline; margin-left: 14px;" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="matchDate" class="col-md-4 col-form-label text-md-right">Data: </label>
                                    <div class="col-md-6">
                                        <input type="date" id="matchDate" class="form-control" name="matchDate" value="" style="width: 180px; display: inline; margin-left: 14px;" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="matchHour" class="col-md-4 col-form-label text-md-right">Godzina: </label>
                                    <div class="col-md-6">
                                        <input type="text" id="matchHour" class="form-control" name="matchHour" value="" style="width: 180px; display: inline; margin-left: 14px;" required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="submit" id="editTeamForm-submit" class="btn btn-success" value="Zapisz"/>
                                </div>
                            </form>
                        </div>

                        <!-- Edit match -->
                        <div class="modal fade bd-example-modal-lg" id="editMatchModal" tabindex="-1" role="dialog" aria-labelledby="editMatch" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Edycja spotkania</h4>
                                    </div>
                                    <form id="editMatchForm" data-toggle="validator" role="form" method="POST">
                                        <br>
                                        <input type="hidden" id="matchId_edit" name="matchId" value=""/>
                                        <input type="hidden" id="matchLeagueId_edit" name="leagueId" value=""/>
                                        <input type="hidden" id="matchHostId_edit" name="hostId" value=""/>
                                        <input type="hidden" id="matchGuestId_edit" name="guestId" value=""/>

                                        <div class="form-group row">
                                            <label for="matchLeague_edit" class="col-md-4 col-form-label text-md-right">Nazwa ligi: </label>
                                            <div class="col-md-6">
                                                <input type="text" id="matchLeague_edit" class="form-control" name="leagueName" style="width: 180px; display: inline; margin-left: 14px;" value="" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="matchHost_edit" class="col-md-4 col-form-label text-md-right">Gospodarz: </label>
                                            <input type="text" id="matchHost_edit" class="form-control" name="hostName" style="width: 180px; display: inline; margin-left: 29px;" value="" disabled>
                                        </div>

                                        <div class="form-group row">
                                            <label for="matchGuest_edit" class="col-md-4 col-form-label text-md-right">Gość: </label>
                                            <div class="col-md-6">
                                                <input type="text" id="matchGuest_edit" class="form-control" name="guestName" style="width: 180px; display: inline; margin-left: 14px;" value="" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="matchStatusPicker_edit" class="col-md-4 col-form-label text-md-right">Status: </label>
                                            <div class="col-md-6">
                                                <select id="matchStatusPicker_edit" class="form-control" style="width: 180px; display: inline; margin-left: 14px;" required>
                                                    <option value="1">Nadchodzące</option>
                                                    <option value="2">Trwające</option>
                                                    <option value="3">Zakończone</option>
                                                    <option value="4">Odwołane</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="matchResult_edit" class="col-md-4 col-form-label text-md-right">Wynik: </label>
                                            <div class="col-md-6">
                                                <input type="text" id="matchResult_edit" class="form-control" name="matchResult" style="width: 180px; display: inline; margin-left: 14px;" value="" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="matchSeason_edit" class="col-md-4 col-form-label text-md-right">Sezon: </label>
                                            <div class="col-md-6">
                                                <input type="text" id="matchSeason_edit" class="form-control" name="matchSeason" style="width: 180px; display: inline; margin-left: 14px;" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="matchDate_edit" class="col-md-4 col-form-label text-md-right">Data: </label>
                                            <div class="col-md-6">
                                                <input type="date" id="matchDate_edit" class="form-control" name="matchDate" style="width: 180px; display: inline; margin-left: 14px;" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="matchHour_edit" class="col-md-4 col-form-label text-md-right">Godzina: </label>
                                            <div class="col-md-6">
                                                <input type="text" id="matchHour_edit" class="form-control" name="matchHour"style="width: 180px; display: inline; margin-left: 14px;" value="" required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <input type="submit" id="editMatchForm-submit" class="btn btn-success" value="Zapisz"/>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Articles -->
                <div id="articles" class="collapse">
                    <nav>
                        <div class="nav nav-tabs" id="maches-submenu" role="tablist">
                            <a class="nav-item nav-link active" id="allArticlesBtn" data-toggle="tab" href="#allArticles"
                               role="tab" aria-controls="nav-allArticles" aria-selected="true">Wszystkie artykuły</a>

                            <a class="nav-item nav-link" id="myArticlesBtn" data-toggle="tab" href="#myArticles"
                               role="tab" aria-controls="nav-ongoing" aria-selected="false">Moje artykuły</a>

                            <a class="nav-item nav-link" id="addArticleBtn" data-toggle="tab" href="#addArticle"
                               role="tab" aria-controls="nav-finished" aria-selected="false">Dodaj nowy artykuł</a>
                        </div>
                    </nav>
                    <br>
                    <div class="tab-content" id="nav-articleContent">
                        <div id="allArticles" class="tab-pane fade show active" role="tabpanel" aria-labelledby="allArticlesBtn">
                            <h3>Wszystkie artykuły</h3>
                            <br>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tytuł</th>
                                        <th scope="col">Autor</th>
                                        <th scope="col">Liga</th>
                                        <th scope="col">Data</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="articlesTableContent">
                                </tbody>
                            </table>
                        </div>
                        <div id="myArticles"  class="tab-pane fade" role="tabpanel" aria-labelledby="myArticles">
                            <h3>Moje artykuły</h3>
                            <br>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tytuł</th>
                                        <th scope="col">Autor</th>
                                        <th scope="col">Liga</th>
                                        <th scope="col">Data</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="myArticlesTableContent">
                                </tbody>
                            </table>
                        </div>
                        <div id="addArticle" class="tab-pane fade" role="tabpanel" aria-labelledby="addArticle">
                            <h3>Dodaj nowy artykuł</h3>
                            <br>
                            <form id="addArticleForm" role="form" data-toggle="validator">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="titleInput" name="title" placeholder="Tytuł" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="articleLeaguePicker">Liga: </label>
                                    <select id="articleLeaguePicker" class="form-control" name="league" style="width: 130px; display: inline;">
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="contentInput" name="content" rows="10" placeholder="Treść artykułu..." required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Dodaj artykuł</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Edit article -->
                    <div class="modal fade bd-example-modal-lg" id="editArticleModal" tabindex="-1" role="dialog" aria-labelledby="editArticle" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Edycja artykułu</h4>
                                </div>
                                <form id="editArticleForm" data-toggle="validator" role="form" method="POST">
                                    <br>
                                    <input type="hidden" id="articleId_edit" name="articleId" value=""/>
                                    <input type="hidden" id="authorId_edit" name="authorId" value=""/>

                                    <div class="form-group row">
                                        <label for="articleTitle_edit" class="col-md-4 col-form-label text-md-right">Tytuł: </label>
                                        <div class="col-md-6">
                                            <input type="text" id="articleTitle_edit" class="form-control" name="title" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="articleLeague_edit" class="col-md-4 col-form-label text-md-right">Liga: </label>
                                        <select id="articleLeague_edit" class="form-control" style="width: 130px; display: inline; margin-left: 14px;" required>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label for="articleContent_edit" class="col-md-4 col-form-label text-md-right">Treść artykułu: </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" id="articleContent_edit" name="content" rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="articleAuthor_edit" class="col-md-4 col-form-label text-md-right">Autor: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" id="articleAuthor_edit" name="author" type="text" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="articleDate_edit" class="col-md-4 col-form-label text-md-right">Data publikacji: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" id="articleDate_edit" name="date" type="text" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="submit" id="editArticleForm-submit" class="btn btn-success" value="Zapisz"/>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </body>

</html><?php }
}
