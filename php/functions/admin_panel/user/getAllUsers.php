<?php

/*******************************************************************************
 * @brief Function returns all users                                           *
 * @author Marek                                                               *
 * @date 27.11.2018                                                            *
 ******************************************************************************/

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
                        '<a class="activateUser" title="Aktywuj"><i class="fas fa-check text-success"></i></a>'.
                        '<a class="editUser" title="Edytuj"><i class="fas fa-edit text-warning"></i></a>'.
                        '<a class="deleteUser" title="Usuń"><i class="fas fa-trash text-danger"></i></a>'.
                        '</th>';
            } else {
                echo '<td scope="col">'.
                        '<a class="editUser" title="Edytuj"><i class="fas fa-edit text-warning"></i></a>'.
                        '<a class="deleteUser" title="Usuń"><i class="fas fa-trash text-danger"></i></a>'.
                        '</th>';
            }
        echo '</tr>';
    }
} else {
    echo '<strong style="color: red; font-size: 14px">Brak użytkowników w bazie danych!</strong>';
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
