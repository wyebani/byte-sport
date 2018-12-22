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
        
        <!-- Add bootstrap -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../../css/fonts.css"/>
        <script src="../../bootstrap/js/bootstrapjquery.js"></script>
        <script src="../../bootstrap/js/bootstrap.js"></script>
        <script src="../../bootstrap/js/popper.js"></script>
        
        <!-- Side menu styles -->
        <link rel="stylesheet" href="../../css/admin.css"/>
        
        <!-- Change view by click on menu -->
        <script src="../../javascript/Click_admin.js"></script>
    </head>
    
    <body>
        <div class="container">
            <header>
                <img src="../../image/banner.jpg" width="100%" height="200" alt="Baner"/>
            </header>

            <!-- Side menu -->

                <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Panel Administratora</h3>
                </div>
                
                <ul class="list-unstyled components">
                    <li>
                        <a href="#users" data-toggle="collapse">
                            Użytkownicy
                        </a>
                    </li>
                    <li>
                        <a href="#leagues" data-toggle="collapse">
                            Ligi
                        </a>
                    </li>
                    <li>
                        <a href="#teams" data-toggle="collapse">
                            Drużyny
                        </a>
                    </li>
                    <li>
                        <a href="#matches" data-toggle="collapse">
                            Spotkania
                        </a>
                    </li>
                    <li>
                        <a href="#articles" data-toggle="collapse">
                            Artykuły
                        </a>
                    </li>
                    <li>
                        <a href="#logout">
                            Wyloguj
                        </a>
                    </li>
                </ul>
            </nav>

                <!-- Page Content -->
            <div id="content">
                <div id="users" class="collapse">
                    <h3>Lista użytkowników</h3>
                    <br>
                    <form method="POST" action="">
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
                        <tbody>
                            <div id="usersTableContent"></div>
                        </tbody>
                    </table>
                    
                </div>
                <div id="leagues" class="collapse">
                    <h3>Ligi</h3>
                    <br>
                    <from method="POST" action="">
                        <input type="text" name="league_name" id="league_name" placeholder="Nazwa ligi" value="" style="height: 39px;" required />  
                        <select id="countryPicker" class="form-control" style="width: 130px; display: inline;">
                            <div id="countyPickerContent"></div>
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
                        <tbody>
                            <div id="leagueTableContent"></div>
                        </tbody>
                    </table>
                </div>
                <div id="teams" class="collapse">
                    <h3>Lista drużyn</h3>
                    <br>
                    <from method="POST" action="">
                        <input type="text" name="team_name" id="team_name" placeholder="Nazwa drużyny" value="" style="height: 39px;" required />
                        <select id="leaguePicker" class="form-control" style="width: 130px; display: inline;">
                            <div id="leaguePickerContent"></div>
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
                        <tbody>
                            <div id="teamTableContent"></div>
                        </tbody>
                    </table>
                </div>
                <div id="matchs" class="collapse">
                    
                    <h3>Spotkania</h3>
                </div>
                <div id="articles" class="collapse">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#allArticles" data-toggle="collapse">Wszystkie artykuły</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#myArticles" data-toggle="collapse">Moje artykuły</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#addArticle" data-toggle="collapse"s>Dodaj nowy artykuł</a>
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
            
        </div>
    </body>
    
</html>