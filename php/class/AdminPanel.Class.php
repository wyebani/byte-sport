<?php

/**
 * Description of AdminPanel
 *
 * @author Marek
 */

require 'PageAction.Class.php';

class AdminPanel extends PageAction {
    
    function add($sTable, $aData) {
        if($this->validate($sTable, $aData) == true) {
            $this->oMySql->insert($sTable, $aData);
        }
    }
    
    function delete($sTable, $iId) {
        
    }
    
    function update($sTable, $aData) {
        
    }
    
    function validate($sTable, $aData) {
        switch($sTable) {
            case 'user': {
                if(empty($aData)) {
                    $this->aError[] = "Wypełnij wymagane pola!";
                    return false;
                }
                
                
                $iCount = $this->oMySql->select('user', 
                            null,
                            array('username', $aData['username']));
                
                if($iCount > 0) {
                    $this->aError[] = "Użytkownik o podanym loginie już istnieje!";
                    return false;
                }
                
                
                
                $iCount = $this->oMySql->select('user_details',
                                null,
                                array('email' => $aData['email']));
                
                if($iCount > 0) {
                    $this->aError[] = "Użytkownik o podanym emailu już istnieje";
                    return false;
                }
                
                return true;
            }
            
            // dla lig, drużyn etc...
        }
    }
}
