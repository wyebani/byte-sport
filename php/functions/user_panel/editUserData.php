<?php

/*******************************************************************************
* @brief Function for edit user data.                                          *
* @author Paweł                                                                *
* @date 16.01.2019                                                             *
*******************************************************************************/


session_start();
require __DIR__ . '/../../class/service/UserService.Class.php';

$oUserService = new UserService();

$aUserData = array();
if (isset($_SESSION['userDetails']["id"])) {
    $aUserData['id'] = $_SESSION['userDetails']["id"];
}
if (isset($_POST['name'])) {
    $aUserData['name'] = $_POST['name'];
}
if (isset($_POST['surname'])) {
    $aUserData['surname'] = $_POST['surname'];
}
if (isset($_POST['email'])) {
    $aUserData['email'] = $_POST['email'];
}
if (isset($_POST['date_of_birth'])) {
    $aUserData['date_of_birth'] = $_POST['date_of_birth'];
}

if (isset($_POST['password']) && isset($_POST['oldpass']) && isset($_POST['confirmpass'])) {

    if ($_POST['password'] != $_POST['confirmpass']) {
        echo "Podane hasła różnią się! \n";
    } else {

        $oldPass = '"' . $_POST['oldpass'] . '"';
        $oldPassConf = loadPassFromDB();
        if (strlen($_POST['password']) < 6) {
            echo "Podane hasło jest za krótkie";
        } else {
            if ($oldPass != $oldPassConf) {
                echo "Niepoprawne hasło \n";
            } else {
                $aUserData['password'] = $_POST['password'];
            }
        }
    }
}

if ($oUserService->updateUser2($aUserData))
    echo "Pomyślna aktualizacja danych użytkownika!";
else
    echo "Nieudana aktualizacja danych użytkownika.";

function loadPassFromDB() {
    $oUserService = new UserService();

    $iUserId = $_SESSION['userDetails']["id"];

    $sQuery = 'SELECT u.password ';
    $sQuery .= 'FROM `user` as u ';
    $sQuery .= 'WHERE u.id = ' . $iUserId;

    $aUser = $oUserService->oMySql->otherQuery($sQuery);

    return json_encode($aUser[0]['password']);
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/