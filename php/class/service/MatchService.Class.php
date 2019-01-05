<?php

require_once __DIR__.'/../Crud.Class.php';

/*******************************************************************************
 * @brief Service for entity match                                             *
 * @author Marek                                                               *
 * @date 05.01.2019                                                            *
 ******************************************************************************/

class MatchSerice extends Crud {
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets all Matches from database.                                *
 * @params:                                                                    *
 *      - none                                                                 *
 * @returns:                                                                   *
 *      - array with matches                                                   *
 *      - false when fail                                                      *
 ******************************************************************************/    
    
    public function getAllMatches() {
        return $this->getAll('match');
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets one match from database.                                  *
 * @params:                                                                    *
 *      - $iId - match ID                                                      *
 * @returns:                                                                   *
 *      - array with match                                                     *
 *      - false when fail                                                      *
 ******************************************************************************/  
    
    public function getMatch($iId) {
        if($iId) {
            return $this->getById('match', $iId);
        } else {
            return false;
        }
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets all Matches by status from database.                      *
 * @params:                                                                    *
 *      - none                                                                 *
 * @returns:                                                                   *
 *      - array with matches                                                   *
 *      - false when fail                                                      *
 ******************************************************************************/      
    
    public function getMatchesByStatus($iStatusId) {
        if($iStatusId) {
            $sQuery = 'SELECT * FROM `match` WHERE status_id = '.$iStatusId;
            return $this->oMySql->otherQuery($sQuery);
        } else {
            return false;
        }
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method adds new match into database.                                  *
 * @params:                                                                    *
 *      -$aMatchData                                                           *
 * @returns:                                                                   *
 *      - match ID when success                                                *
 *      - false when fail                                                      *
 ******************************************************************************/    
    
    public function addMatch($aMatchData) {
        if(!empty($aMatchData)) {
            return $this->addOne('match', $aMatchData);
        } else {
            return false;
        }
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method deletes match from database.                                   *
 * @params:                                                                    *
 *      -$iId - match ID                                                       *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/    
    
    public function deleteMatch($iId) {
        if($iId != null) {
            return $this->delete('match', $iId);
        } else { 
            return false;
        }
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method for update match.                                              *
 * @params:                                                                    *
 *      -$aMatchData                                                           *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/    
            
    public function updateMatch($aMatchData) {
        if(!empty($aMatchData)) {
            $this->update('match', 
                    array('host_id' => $aMatchData['host_id'],
                        'guest_id' => $aMatchData['guest_id'],
                        'date_time' => $aMatchData['date_time'],
                        'host_score' => $aMatchData['host_score'],
                        'guest_score' => $aMatchData['guest_score'],
                        'season' => $aMatchData['season'],
                        'league_id' => $aMatchData['league_id'],
                        'status_id' => $aMatchData['status_id']),
                    array('id' => $aMatchData['id']));
        } else {
            return false;
        }
    } 
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/