<?php

require_once __DIR__.'/../Crud.Class.php';

/*******************************************************************************
 * @brief Service for entity League                                              *
 * @author Marek                                                               *
 * @date 03.12.2018                                                            *
 ******************************************************************************/

class LeagueService extends Crud {
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets all Leagues from database.                                *
 * @params:                                                                    *
 *      - none                                                                 *
 * @returns:                                                                   *
 *      - array with users                                                     *
 *      - false when fail                                                      *
 ******************************************************************************/
    
    public function getAllLeagues() {
        return $this->getAll('league');
    } 
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets one League from database.                                 *
 * @params:                                                                    *
 *      - $iId - league ID                                                     *
 * @returns:                                                                   *
 *      - array with users                                                     *
 *      - false when fail                                                      *
 ******************************************************************************/
    
    public function getLeague($iId) {
        return $this->getById('league', $iId);
    }     
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method adds new league into database.                                 *
 * @params:                                                                    *
 *      -$sLeagueName - league name                                            *
 *      -$sCounty - league country                                             *
 * @returns:                                                                   *
 *      - league ID when success                                               *
 *      - false when fail                                                      *
 ******************************************************************************/    
    
    public function addNewLeague($sLeagueName, $sCounty) {
        if(empty($sLeagueName) && empty($sCounty)) {
            return false;
        }
        
        $iId = $this->addOne('league',
                        array('name' => $sLeagueName,
                        'country' => $sCounty));
        
        if($iId != null) {
            $this->addOne('league_details',
                        array('id' => $iId));
        } else {
            return false;
        }
        
        return $iId;
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method deletes league from database.                                  *
 * @params:                                                                    *
 *      -$iId - league ID                                                      *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/    
    
    public function deleteLeague($iId) {
        $bResult = false;
        
        if($iId != null) {
            $bResult = $this->delete('league', $iId);
            if($bResult) {
                $bResult = $this->delete('league_details', $iId);
            } else {
                return false;
            }
        }     
        return $bResult;
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method for update league.                                             *
 * @params:                                                                    *
 *      -$aLeagueData - array with league fields                               *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/

    public function updateLeague($aLeagueData) {
        if(empty($aLeagueData)) {
            return false;
        }
        
        $bResult = false;
        
        $bResult = $this->update('league', 
                array('name' => $aLeagueData['name'],
                'country' => $aLeagueData['country']),                            
                array('id' => $aLeagueData['id']));
        
        if($bResult) {
             $this->update('league_details',
                    array('organizer' => $aLeagueData['organizer'],
                    'date_of_found' => $aLeagueData['date_of_found']),
                    array('id' => $aLeagueData['id']));
        }
        
        return $bResult;
    }    
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
