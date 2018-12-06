<?php

require '../class/LoginUser.Class.php';
session_start();

$loginController = new LoginUser();
$loginController->oSmarty->display("user-panel.tpl");
