<?php

require 'PageAction.Class.php';

/*******************************************************************************
 * @brief Login user class                                                     *
 * @author Marek                                                               *
 * @date 10.11.2018                                                            *
 ******************************************************************************/

class LoginUser extends PageAction {
    var $aData       = array();
    var $bLogin      = false;
    var $sTable      = 'user';
	
/*******************************************************************************
 * @brief                                                                      *
 *       Method checks the values given by the user.                           *
 * @params:                                                                    *
 *      $aUserdata - user data                                                 *
 *      $sUsername - user login                                                *
 *      $sPassword - user password                                             *
 * @returns:                                                                   *
 *      - none                                                                 *
 ******************************************************************************/      
    
    function LoginErrorInfo($aUserData, $sUsername, $sPassword) {
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
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method put user into $_SESSION object.                                *
 * @params:                                                                    *
 *      $aUserdata - user data                                                 *
 *      $sUsername - user login                                                *
 * @returns:                                                                   *
 *      - true if success                                                      *
 *      - false if fail                                                        *
 ******************************************************************************/    
	
    function SetSession($aUserData, $sUsername) {
        if(!$this->aError) {
            $_SESSION['userData'] = $aUserData;
            $_SESSION['userDetails'] = $this->oMySql->select('user_details', 1,
                            array('id' => $aUserData['id']));
            
            $this->aData = $aUserData;
            $this->bLogin = true;
            
            $this->oMySql->update('user_details',
                            array('login_success' => date("Y-m-d, H:i:s")),
                            array('id' => $aUserData['id']));        
            return true;
        } else {
            $this->oMySql->update('user_details',
                            array('login_failure' => date("Y-m-d H:i:s")),
                            array('id' => $aUserData['id']));
            
            $this->bLogin = false;
            $this->setMesagges();
            return false;
        }
    }

/*******************************************************************************
 * @brief                                                                      *
 *       Method log in user into service.                                      *
 * @params:                                                                    *
 *      $aUserdata - user data                                                 *
 *      $sUsername - user login                                                *
 * @returns:                                                                   *
 *      - true if success                                                      *
 *      - false if fail                                                        *
 ******************************************************************************/    
    
    function Login($sUsername, $sPassword) { 
        $aUserData = $this->oMySql->select($this->sTable, 1, 
                            array('username' => $sUsername,
                            'password' => hash('sha512', $sPassword),
                            'active' => '1'));
        
        $sPassword = hash('sha512', $sPassword);
        
        $this->LoginErrorInfo($aUserData, $sUsername, $sPassword);
        
       if($this->SetSession($aUserData, $sUsername)) {
            return true;
	} else {
            return false;
        }   
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method log in admin into service.                                     *
 * @params:                                                                    *
 *      $aUserdata - user data                                                 *
 *      $sUsername - user login                                                *
 * @returns:                                                                   *
 *      - true if success                                                      *
 *      - false if fail                                                        *
 ******************************************************************************/    
    
    function LoginAdmin($sUsername, $sPassword) {
        $aUserData = $this->oMySql->select($this->sTable, 1, 
                            array('username' => $sUsername,
                            'password' => hash('sha512', $sPassword),
                            'active' => '1',
                            'permissions' => '1'));
        
        $sPassword = hash('sha512', $sPassword);
        
	$this->LoginErrorInfo($aUserData, $sUsername, $sPassword);
        
        if($this->SetSession($aUserData, $sUsername)) {
            return true;
	} else {
            return false;
        }
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method log out user from service.                                     *
 * @params:                                                                    *
 *      - none                                                                 *
 * @returns:                                                                   *
 *      - none                                                                 *
 ******************************************************************************/     
    
    function Logout() {
        $_SESSION['username']       = null;
        $_SESSION['password']       = null;
        $_SESSION['permissions']    = null;
        $_SESSION['userData']       = null;
        $_SESSION['userLogin']      = null;
        
        $this->aData                = null;
        $this->bLogin               = false;
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method sets messages into Smarty object.                              *
 * @params:                                                                    *
 *      - none                                                                 *
 * @returns:                                                                   *
 *      - none                                                                 *
 ******************************************************************************/    
    
    function setMesagges() {
        $this->oSmarty->assign('aMessage', $this->aMessage);
        $this->oSmarty->assign('aWarning', $this->aWarning);
        $this->oSmarty->assign('aError', $this->aError);
        $this->oSmarty->assign('aSuccess', $this->aSuccess);
  }
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
