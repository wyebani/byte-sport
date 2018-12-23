<?php

require __DIR__.'/../../../class/service/UserService.Class.php';

$oUserService = new UserService();
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
                        '<i class="fa fa-check text-success"> </i>'.
                        '<i class="fa fa-edit text-warning"> </i>'.
                        '<i class="fa fa-trash text-danger"></i>'.
                        '</th>';
            } else {
                echo '<td scope="col">'.
                        '<i class="fa fa-edit text-warning"> </i>'.
                        '<i class="fa fa-trash text-danger"></i>'.
                        '</th>';
            }
        echo '</tr>';
    }
} else {
    echo '<strong style="color: red; font-size: 14px">Brak użytkowników w bazie danych!</strong>';
}
