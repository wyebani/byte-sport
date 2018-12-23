<!DOCTYPE html>
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
        <script src="../../javascript/jquery.js"></script>
        <script src="../../bootstrap/js/bootstrap.js"></script>
        <script src="../../bootstrap/js/popper.js"></script>
        <script src="../../bootstrap/js/bootstrap-validator.js"></script>
        
        <!-- Font-awesome icons -->
        <link rel="stylesheet" href="../../bootstrap/css/fonts.css"/>
        
        <!-- Side menu styles -->
        <link rel="stylesheet" href="../../css/admin.css"/>
        
        <!-- Admin panel scripts -->
        <script src="../../javascript/admin-panel.js"></script>
       
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
                        <a href="#logout" id="logoutBtn">
                            Wyloguj
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
                </div>
                
                <!-- Leagues -->
                <div id="leagues" class="collapse">
                    <h3>Ligi</h3>
                    <br>
                    <from id="addLeagueFrom" data-toggle="validator" novalidate="true">
                        <input type="text" name="league_name" id="league_name" placeholder="Nazwa ligi" value="" style="height: 39px;" required />  
                        <select id="countryPicker" class="form-control" style="width: 130px; display: inline;" required>
                            <option>Polska</option>
                            <option>Niemcy</option>
                            <option>Hiszpania</option>
                            <option>Portugalia</option>
                            <option>Rosja</option>
                            <option>Włochy</option>
                            <option>Brazylia</option>
                            <option>Francja</option>
                            <option>Anglia</option>
                        </select>
                        <input type="submit" name="addLeague-submit" id="addLeague-submit" class="btn btn-success" value="Dodaj nową ligę">
                    </from>
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
                </div>
                
                <!-- Teams -->
                <div id="teams" class="collapse">
                    <h3>Lista drużyn</h3>
                    <br>
                    <from id="addTeamForm" data-toggle="validator" novalidate="true">
                        <input type="text" name="team_name" id="team_name" placeholder="Nazwa drużyny" value="" style="height: 39px;" required />
                        <select id="leaguePicker" class="form-control" style="width: 130px; display: inline;">
                        </select>
                        <input type="submit" name="addTeam-submit" id="addTeam-submit" class="btn btn-success" value="Dodaj nową drużynę">
                    </from>
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
                </div>
                
                <!-- Matches -->
                <div id="matches" class="collapse">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#allMatchesBtn" data-toggle="collapse">Wszystkie spotkania</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#ongoingMatchesBtn" data-toggle="collapse">Trwające spotkania</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#finishedMatchesBtn" data-toggle="collapse">Zakończone spotkania</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#addMatchBtn" data-toggle="collapse">Dodaj spotkanie</a>
                            </li>
                        </ul>
                    </nav>
                    
                    <div id="container-fluid">
                        <div id="allMatches" class="collapse">
                            <h3>Wszystkie spotkania</h3>
                        </div>
                        
                        <div id="ongoingMatches" class="collapse">
                            <h3>Trwające spotkania</h3>
                        </div>
                        
                        <div id="finishedMatches" class="collapse">
                            <h3>Zakończone spotkania</h3>
                        </div>
                        
                        <div id="addMatch" class="collapse">
                            <h3>Dodaj spotkanie</h3>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Articles -->
                <div id="articles" class="collapse">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#allArticlesBtn" data-toggle="collapse">Wszystkie artykuły</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#myArticlesBtn" data-toggle="collapse">Moje artykuły</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#addArticleBtn" data-toggle="collapse">Dodaj nowy artykuł</a>
                            </li>
                        </ul>
                    </nav>
                    <br>
                    <div class="container-fluid">
                        <div id="allArticles" class="collapse">
                            <h3>Wszystkie artykuły</h3>
                        </div>
                        <div id="myArticles" class="collapse">
                            <h3>Moje artykuły</h3>
                        </div>
                        <div id="addArticle" class="collapse">
                            <h3>Dodaj nowy artykuły</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </body>
    
</html>