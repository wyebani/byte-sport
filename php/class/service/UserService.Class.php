<?php

require '../class/Crud.Class.php';

/*******************************************************************************
 * @brief Service for entity User                                              *
 * @author Marek                                                               *
 * @date 03.12.2018                                                            *
 ******************************************************************************/
class UserService extends Crud {
    
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
 *       Method gets one User from database.                                   *
 * @params:                                                                    *
 *      - $iId - user ID                                                       *
 * @returns:                                                                   *
 *      - array with users                                                     *
 *      - false when fail                                                      *
 ******************************************************************************/
    
    public function getUser($iId) {
        return $this->getById('user', $iId);
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
        if(empty($sUsername)) {
            return false;
        }
        
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
        $bResult = false;
        
        if($iId != null) {
            $bResult = $this->delete('user', $iId);
            if($bResult) {
                $bResult = $this->delete('user_details', $iId);
            } else {
                return false;
            }
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
        if($iId != null) {
            return $this->update('user',
                    array('active' => 1),
                    array('id' => $iId));
        }
        return false;
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method for update user.                                               *
 * @params:                                                                    *
 *      -$aUserData - array with user fields                                   *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/

    public function updateUser($aUserData) {
        if(empty($aUserData)) {
            return false;
        }
        
        $bResult = false;
        
        $bResult = $this->update('user', 
                array('username' => $aUserData['username'],
                            'password' => hash('sha512', $aUserData['password']),
                            'permissions' => $aUserData['permissions'],
                            'active' => $aUserData['active']),
                array('id' => $aUserData['id']));
        
        if($bResult) {
             $this->update('user_details',
                    array('name' => $aUserData['name'],
                            'surname' => $aUserData['surname'],
                            'date_of_birth' => $aUserData['date_of_birth'],
                            'email' => $aUserData['email']),
                    array('id' => $aUserData['id']));
        }
        
        return $bResult;
    }
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/