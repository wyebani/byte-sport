<?php

require 'Crud.Class.php';

/*******************************************************************************
 * @brief Admin panel class                                                    *
 * @author Marek                                                               *
 * @date 01.12.2018                                                            *
 ******************************************************************************/

class AdminPanel extends Crud {
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets all Users from database.                                  *
 * @params:                                                                    *
 *      - none                                                                 *
 * @returns:                                                                   *
 *      - array with users                                                     *
 *      - false when fail                                                      *
 ******************************************************************************/
    
    public function getAllUsers() {
        return $this->getAll('user');
    }

/*******************************************************************************
 * @brief                                                                      *
 *       Method adds new user into database.                                   *
 * @params:                                                                    *
 *      -$sUsername - user login                                               *
 * @returns:                                                                   *
 *      - user ID when success                                                 *
 *      - false when fail                                                      *
 ******************************************************************************/
    
    public function addNewUser($sUsername) {
        $iId = $this->addOne('user',
                        array('username' => $sUsername,
                        'password' => hash('sha512', 'haslo'),
                        'permissions' => 0,
                        'active' => 1));
        
        if($iId != null) {
            $this->addOne('user_details',
                        array('id' => $iId));
        } else {
            return false;
        }
        
        return $iId;
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method deletes user from database.                                    *
 * @params:                                                                    *
 *      -$iId - user ID                                                        *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/    
    
    public function deleteUser($iId) {
        $bResult = $this->delete('user', $iId);
        if($bResult) {
            $bResult = $this->delete('user_details', $iId);
        } else {
            return false;
        }
        
        return $bResult;
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method activate user.                                                 *
 * @params:                                                                    *
 *      -$iId - user ID                                                        *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/     
    
    public function activateUser($iId) {
        return $this->update('user',
                    array('active' => 1),
                    array('id' => $iId));
    }
    
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
