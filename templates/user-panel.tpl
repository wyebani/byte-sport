<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Panel Użytkownika</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css"/>
        <script src="../../javascript/jquery.js"></script>
        <script src="../../bootstrap/js/bootstrap.js"></script>
        <script src="../../bootstrap/js/popper.js"></script>
        <script src="../../bootstrap/js/bootstrap-validator.js"></script>
        
        <!-- Font-awesome icons -->
        <link rel="stylesheet" href="../../fontawesome/css/all.css"/>
        
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
                    <h3>Panel Użytkownika</h3>
                </div>
                
                <ul class="list-unstyled components">
                    <li>
                        <a href="#home" id="homePageBtn" data-toggle="collapse">
                            Strona Główna
                        </a>
                    </li>
                    <li>
                        <a href="#personalDate" id="personalDateBtn" data-toggle="collapse">
                            Dane Osobowe
                        </a>
                    </li>
                    <li>
                        <a href="#favoriteTeams" id="favoriteTeamsBtn" data-toggle="collapse">
                            Moja Ulubiona Liga
                        </a>
                    </li>
                    <li>
                        <a href="#password" id="passwordBtn" data-toggle="collapse">
                            Zmiana Hasła
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
                
                <!-- Personal Date -->
                <div id="personalDate" class="collapse">
                    <h3>Dane Osobowe</h3>
                    <br>
                    
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

                                  <div class="modal-footer">
                                      <input type="submit" id="editUserForm-submit" class="btn btn-success" value="Zapisz zmiany"/>
                                  </div>
                              </form>
                               
                </div>
                
                <!-- My favorite teams -->
                <div id="favoriteTeams" class="collapse">
                    <h3>Ulubione Ligi</h3>
                    <br>
                   
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
                        <input type="submit" name="addLeague-submit" id="addLeague-submit" class="btn btn-success" value="Dodaj ulubioną ligę">
                   
                    <br>
                    <table class="table table-stripped text-center">
                        <thead>
                            <tr>
							
                                <th scope="col">ID</th>
                                <th scope="col">Nazwa ligi</th>
                                <th scope="col"></th>
								
                            </tr>
                        </thead>
                        <tbody id="myLeagues">
                        </tbody>
                    </table>
                    
                                
                </div>
                
                <!-- Change Password -->
                <div id="password" class="collapse">
                    <h3>Zmiana Hasła</h3>
					
						<div class="form-group row">
                                   
								    <label for="oldPassword" class="col-md-4 col-form-label text-md-right">Stare Hasło:</label>
                                      <div class="col-md-6">
                                          <input type="password" id="old_password_edit" class="form-control" name="old_password" value="" data-minlength="6">
										  <br>
                                      </div>
								   
								   <label for="newPassword" class="col-md-4 col-form-label text-md-right">Nowe Hasło:</label>
                                      <div class="col-md-6">
                                          <input type="password" id="new_password_edit" class="form-control" name="new_password" value="" data-minlength="6">
                                          <div class="help-block">Minimalna długość hasła 6 znaków</div>
                                      </div>
                                      
                                      <label for="passworConfirm" class="col-md-4 col-form-label text-md-right">Potwierdź hasło:</label>
                                      <div class="col-md-6">
                                          <input type="password" id="password_confirm_edit" class="form-control" name="password_confirm" value="" 
                                                 data-match="#newPassword" data-match-error="Podane hasła rożnią się">
                                          <div class="help-block with-errors"></div>
                                      </div>
									  
									  
                        </div>
						 <div class="modal-footer">
                                      <input type="submit" id="editUserForm-submit" class="btn btn-success" value="Zapisz"/>
                                  </div>
                   
                </div>
            </div>
        </div>       
    </body>
    
</html>