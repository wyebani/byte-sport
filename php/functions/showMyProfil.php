<?php
    
session_start();

if($_SESSION['isLogin'] == true) {
    header("Location: ../../templates/user-panel.html");
}

