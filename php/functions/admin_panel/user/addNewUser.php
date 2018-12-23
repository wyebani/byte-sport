<?php

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();
$sUsername = $_POST['username'];
$sEmail = $_POST['email'];

if(trim($sUsername)) {
    $oUserService->addNewUser($sUsername, $sEmail);
}

$aUsers = $oUserService->getAllUsers();
        
if($aUsers) {
    foreach ($aUsers as $key => $value) {
        echo '<tr>';
            echo '<th scope="col">'.$value['id'].'</th>';
            echo '<td scope="col">'.$value['username'].'</th>';
            echo '<td scope="col">'.$value['name'].'</th>';
            echo '<td scope="col">'.$value['surname'].'</th>';
            echo '<td scope="col">'.$value['email'].'</th>';
            if($value['active'] == 0) {
                echo '<td scope="col">'.
                        '<a class="activateUser" title="Aktywuj"><i class="fa fa-check text-success"></i></a>'.
                        '<a class="editUser" data-toggle="modal" data-target="#editUserModal"><i class="fa fa-edit text-warning"></i></a>'.
                        '<a class="deleteUser" title="Usuń"><i class="fa fa-trash text-danger"></i></a>'.
                        '</th>';
            } else {
                echo '<td scope="col">'.
                        '<a class="editUser" data-toggle="modal" data-target="#editUserModal"><i class="fa fa-edit text-warning"></i></a>'.
                        '<a class="deleteUser" title="Usuń"><i class="fa fa-trash text-danger"></i></a>'.
                        '</th>';
            }
        echo '</tr>';
    }
}