
<?php
    require '../class/LoginUser.Class.php';
    
    $loginController = new LoginUser();
    $isLogin = $loginController->LoginAdmin($_POST['username'], $_POST['password']);
    
	
    if($isLogin) {
        $loginController->getSmarty()->display("login_admin.tpl");
    } else {
        echo "Nie udało się zalogować";
    }


?>
