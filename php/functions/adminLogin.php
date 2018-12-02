
<?php
    require '../class/LoginUser.Class.php';
    
    $loginController = new LoginUser();
    $isLogin = $loginController->LoginAdmin($_POST['username'], $_POST['password']);
    
	
    if($isLogin) {
        $loginController->oSmarty->display("login_admin.tpl");
    } else {
        echo "Nie udało się zalogować";
    }


?>
