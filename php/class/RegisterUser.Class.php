<?php

require 'PageAction.Class.php';

/*******************************************************************************
 * @brief Class for register new account.                                      *
 * @author Marek                                                               *
 * @date 10.11.2018                                                            *
 ******************************************************************************/

class RegisterUser extends PageAction {
   
/*******************************************************************************
 * @brief                                                                      *
 *       Method checks if this field exist in table.                           *
 * @params                                                                     *
 *      - $sTable - table name                                                 *
 *      - $sKey - name of field                                                *
 *      - $sValue - value                                                      *
 * @return                                                                     *
 *      - true if not exist                                                    * 
 *      - false if exist                                                       * 
 ******************************************************************************/     
    
    function validate($sTable, $sKey, $sValue) {      
       $aResult = $this->oMySql->select($sTable, null, array($sKey => $sValue));

       if(empty($aResult)) {
           return true;
       }
       else {
           return false;
       }
   }
   
/*******************************************************************************
 * @brief                                                                      *
 *       Method insert new user into database.                                 *
 * @params                                                                     *
 *      - $aUserData - array with user data.                                   *
 * @return                                                                     *
 *      - true if succes                                                       * 
 *      - false if fail                                                        * 
 ******************************************************************************/    
   
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
          $iUserId = $this->oMySql->insert('user',
                            array('username' => $aUserData['username'],
                            'password' => hash('sha512', $aUserData['password']),
                            'active' => 0,
                            'permissions' => 0));

          if($iUserId) {
             $this->oMySql->insert('user_details',
                            array('id' => $iUserId,
                            'name' => $aUserData['name'],
                            'surname' => $aUserData['surname'],
                            'date_of_birth' => $aUserData['date_of_birth'],
                            'email' => $aUserData['email']));
          }
          
          if($iUserId) {
            return true;
          }
       } else {
           $this->setMesagges();
           return false;
       }
   }
   
/*******************************************************************************
 * @brief                                                                      *
 *       Method sets massages for Smarty object.                               *
 * @return                                                                     *
 *      none                                                                   *
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

