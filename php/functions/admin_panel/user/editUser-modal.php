<?php

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();
$iUserId = $_GET['userId'];

if($iUserId) {
    $sQuery = 'SELECT u.id, u.username, u.password, u.permissions, u.active, ';
    $sQuery .= 'ud.name, ud.surname, ud.date_of_birth, ud.email, ud.login_success, ud.login_failure ';
    $sQuery .= 'FROM `user` as u ';
    $sQuery .= 'INNER JOIN `user_details` as ud ';
    $sQuery .= 'ON u.id = ud.id ';
    $sQuery .= 'WHERE u.id = '.$iUserId;
    $aUser = $oUserService->oMySql->otherQuery($sQuery);
    if($aUser) {
        echo '<div class="modal-header">';
            echo '<h4>Edycja użytkownika</h4>';
        echo '</div>';
        
        echo '<id="editUserForm" data-toggle="validator" novalidate="true">';
            echo '<br>';
            echo '<input type="hidden" name="id" value="'.$aUser['0']['id'].'"/>';
            echo '<div class="form-group row">';
                echo '<label for="username" class="col-md-4 col-form-label text-md-right">Nazwa użytkownika:</label>';
                echo '<div class="col-md-6">';
                    echo '<input type="text" id="username" class="form-control" name="username" value='.$aUser['0']['username'].'>';
                echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group row">';
                echo '<label for="name" class="col-md-4 col-form-label text-md-right">Imie:</label>';
                echo '<div class="col-md-6">';
                    echo '<input type="text" id="name" class="form-control" name="name" value='.$aUser['0']['name'].'>';
                echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group row">';
                echo '<label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko:</label>';
                echo '<div class="col-md-6">';
                    echo '<input type="text" id="surname" class="form-control" name="surname" value='.$aUser['0']['surname'].'>';
                echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group row">';
                echo '<label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>';
                echo '<div class="col-md-6">';
                    echo '<input type="email" id="email" class="form-control" name="email" value='.$aUser['0']['email'].'>';
                echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group row">';
                echo '<label for="dateOfBirth" class="col-md-4 col-form-label text-md-right">Data urodzenia:</label>';
                echo '<div class="col-md-6">';
                    echo '<input type="date" id="dateOfBirth" class="form-control" name="date_of_birth" value='.$aUser['0']['date_of_birth'].'>';
                echo '</div>';
            echo '</div>';
            
            echo '<input type="hidden" id="old_password" name="old_password" value='.$aUser['0']['password'].'>';
            
            echo '<div class="form-group row">';
                echo '<label for="new_password" class="col-md-4 col-form-label text-md-right">Zmień hasło:</label>';
                echo '<div class="col-md-6">';
                    echo '<input type="password" id="new_password" class="form-control" name="new_password">';
                echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group row">';
                echo '<label for="password_confirm" class="col-md-4 col-form-label text-md-right">Potwierdź hasło:</label>';
                echo '<div class="col-md-6">';
                    echo '<input type="password" id="password_confirm" class="form-control" name="password_confirm">';
                echo '</div>';
            echo '</div>';
            
            echo '<div class="modal-footer">';
                echo '<input type="submit" id="editUserForm-submit" class="btn btn-success" value="Zapisz"/>';
            echo '</div>';            
        echo '</form>';   
    } else {
        '<strong style="color: red; font-size: 14px">Błąd podczas komunikacji z bazą danych!</strong>';
    }
    
} else {
    echo '<strong style="color: red; font-size: 14px">Nie ma takiego użytkownika</strong>';
}