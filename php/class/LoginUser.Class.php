<?php
/**
 * @author Marek
 * @date 10.11.2018
 * @description: Class for login user.
 */

require 'PageAction.Class.php';

class LoginUser extends PageAction {
    var $aData       = array();
    var $bLogin      = false;
    var $sTable      = 'user';
	
	function LoginErrorInfo($aUserData,$sUsername, $sPassword)
	{
		 if(empty($aUserData)) {
            $this->aError[] = 'Niepoprawny login lub hasło.';
        } else {
            if($aUserData['active'] == 0) {
                $this->aWarning[] = 'Konto użytkownika jeszcze nie zostało aktywowane.';
            } else if($sUsername != $aUserData['username']) {
                $this->aError[] = 'Podany login jest nieprawidłowy.';
            } else if($sPassword != $aUserData['password']) {
                $this->aError[] = 'Podane hasło jest nieprawidłowe.';
            } 
        }
	}
	
	function LoginValidation($aUserData,$sUsername)
	{
		 if(!$this->aError) {
            $_SESSION['username'] = $aUserData['username'];
            $_SESSION['password'] = $aUserData['password'];
            
            if($aUserData['permissions'] == 1) {
                $_SESSION['permissions'] = true;
            } else {
                $_SESSION['permissions'] = false;
            }
            $_SESSION['userData'] = $aUserData;
            $_SESSION['userLogin'] = true;
            
            $this->aData = $aUserData;
            $this->bLogin = true;
            
            $this->oMySql->update($this->sTable,
                                array('login_success' => date("Y-m-d, H:i:s")),
                                array('username' => $sUsername));        
            return true;
        } else {
            $this->oMySql->update($this->sTable,
                                array('login_failure' => date("Y-m-d H:i:s")),
                                array('username' => $sUsername));
            
            $this->bLogin = false;
            $this->setMesagges();
            return false;
        }
	}
	
    
    function Login($sUsername, $sPassword) { 
        $aUserData = $this->oMySql->select($this->sTable, 1, array('username' => $sUsername,
                                                                    'password' => hash('sha512', $sPassword),
                                                                    'active' => '1'));
        $sPassword = hash('sha512', $sPassword);
        
        $this->LoginErrorInfo($aUserData,$sUsername, $sPassword);
        
       if($this -> LoginValidation($aUserData,$sUsername)) 
	   {
		   return true;
	   }
	   else return false;
        
       
    }
    
    function LoginAdmin($sUsername, $sPassword) {
        $aUserData = $this->oMySql->select($this->sTable, 1, array('username' => $sUsername,
                                                                    'password' => hash('sha512', $sPassword),
                                                                    'active' => '1',
                                                                    'permissions' => '1'));
        
        $sPassword = hash('sha512', $sPassword);
        
		$this->LoginErrorInfo($aUserData,$sUsername, $sPassword);
        
       if($this -> LoginValidation($aUserData,$sUsername)) 
	   {
		   return true;
	   }
	   else return false;
    }
    
    function Logout() {
        $_SESSION['username']       = null;
        $_SESSION['password']       = null;
        $_SESSION['permissions']    = null;
        $_SESSION['userData']       = null;
        $_SESSION['userLogin']      = null;
        
        $this->aData                = null;
        $this->bLogin               = false;
    }
    
    function setMesagges() {
        $this->oSmarty->assign('aMessage', $this->aMessage);
        $this->oSmarty->assign('aWarning', $this->aWarning);
        $this->oSmarty->assign('aError', $this->aError);
        $this->oSmarty->assign('aSuccess', $this->aSuccess);
  }
}
