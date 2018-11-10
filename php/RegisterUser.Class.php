<?php

/**
 * @author Marek
 * @date 10.11.2018
 * @description: Class for register new account.
 */
class RegisterUser {
   var $oMySql;
   var $aError      = array();
   var $aMessage    = array();
   var $aWarning    = array();
   var $aSuccess    = array();
   var $bRegister   = false;
   
   public function __construct($oMySql) {
       $this->oMySql = $oMySql;
   }
   
    function validate($sTable, $sKey, $sValue) {      
       $aResult = $this->oMySql->select($sTable, null, array($sKey => $sValue));

       if(empty($aResult)) {
           return true;
       }
       else {
           return false;
       }
   }
   
   function Register($aUserData) {       
       if(!$this->validate('user', 'username', $aUserData['username'])) {
           $this->aError[] = 'Użytkownik o podanym loginie już istnieje!';
       }
       
       if(!$this->validate('user', 'username', $aUserData['username'])) {
           $this->aError[] = 'Użytkownik o podanym emailu już istnieje!';
       }
       
       if(strlen($aUserData['password']) < 7) {
           $this->aError[] = 'Podane hasło jest za krótkie!';
       }
       
       if(strlen($aUserData['password']) > 20) {
           $this->aError[] = 'Podane hasło jest za długie!';
       }
       
       if(empty($this->aError)) {
          $iUserId = $this->oMySql->insert('user', array('username' => $aUserData['username'],
                                'password' => md5($aUserData['password']),
                                'active' => 0,
                                'permissions' => 0));
          if($iUserId) {
             $this->oMySql->insert('user_details', array('user_id' => $iUserId,
                                                    'name' => $aUserData['name'],
                                                    'surname' => $aUserData['surname'],
                                                    'date_of_birth' => $aUserData['date_of_birth'],
                                                    'email' => $aUserData['email']));
          }
          
          
          
          if($iUserId) {
              // Jakoś przekazać wiadomość do frontu
            $this->aMessage[] = 'Rejestracja przebiegła pomyślnie';
            return true;
          }
       } else {
           // Jakoś przekazać tablice errorów do frontu
           return false;
       }
   }
   
}

