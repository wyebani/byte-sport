<?php

require_once __DIR__.'/../Crud.Class.php';

/*******************************************************************************
 * @brief Service for entity Team																						*
 * @author Pawel																											*
 * @date 03.12.2018																										*
 ******************************************************************************/

class TeamService extends Crud {
    
/*******************************************************************************
 * @brief																														*
 *       Method gets all Teams from database.																		*	
 * @params:																													*
 *      - none 																													*
 * @returns:																													*
 *      - array with users																									*
 *      - false when fail																										*
 ******************************************************************************/
    
    public function getAllTeams() {
        return $this->getAll('team');
    } 
    
/*******************************************************************************
 * @brief                                                                      													*
 *       Method gets one Team from database.																		*		
 * @params:																													*
 *      - $iId - team ID																										*
 * @returns:                                                            												       	*
 *      - array with teams																									*
 *      - false when fail																										*
 ******************************************************************************/
    
    public function getTeam($iId) {
        return $this->getById('team', $iId);
    }     
    
/*******************************************************************************
 * @brief                                                                      													*
 *       Method gets list of Teams by League ID																		*		
 * @params:																													*
 *      - $iId - league ID																										*
 * @returns:                                                            												       	*
 *      - array with teams																									*
 *      - false when fail																										*
 ******************************************************************************/    
    
    public function getTeamByLeagueId($iLeagueId) {
        if($iLeagueId) {
            return $this->oMySql->select('team', 
                    NULL,
                    array('league_id' => $iLeagueId));
        } else {
            return false;
        }
    }
    
/*******************************************************************************
 * @brief                                                                      													*
 *       Method adds new team into database.																		*
 * @params:                                                                    												*
 *      -$sTeamName - team name                                         											*                                             
 * @returns:       	                                                           												*
 *      - team ID when success																							*
 *      - false when fail                                                      												*
 ******************************************************************************/    
    
    public function addNewTeam($sTeamName, $iLeague) {
        if(empty($sTeamName)) {
            return false;
        }
        
        $iId = $this->addOne('team',
                        array('name' => $sTeamName,
                        'league_id' => $iLeague));
        
        return $iId;
    }
    
/*******************************************************************************
 * @brief																														*
 *       Method deletes team from database.																		*
 * @params:																													*
 *      -$iId - team ID																										*
 * @returns:																													*
 *      - true when success																								*
 *      - false when fail																										*
 ******************************************************************************/    
    
    public function deleteTeam($iId) {
        $bResult = false;
        
        if($iId != null) {
            $bResult = $this->delete('team', $iId);
            if($bResult) {
                $bResult = $this->delete('team_details', $iId);
            } else {
                return false;
            }
        }     
        return $bResult;
    }
    
/*******************************************************************************
 * @brief                                                                      													*
 *       Method for update team.                                           												*
 * @params:                                                                    												*
 *      -$aTeamData - array with team fields                               											*
 * @returns:                                                                   												*
 *      - true when success                                                    											*
 *      - false when fail                                                      												*
 ******************************************************************************/

    public function updateTeam($aTeamData) {
        if(empty($aTeamData)) {
            return false;
        }
        
        $bResult = false;
        
        $bResult = $this->update('team', 
                array('name' => $aTeamData['name']),                            
                array('id' => $aTeamData['id']));
        
        if($bResult) {
             $this->update('team_details',
                    array('founder' => $aTeamData['founder'],
                            'date_of_found' => $aTeamData['date_of_found'],
							'ground' => $aTeamData['ground'],
							'president' => $aTeamData['president'],
							'head_couch' => $aTeamData['head_couch'],
							'league_id' => $aTeamData['league_id'],
							'website' => $aTeamData['website']),
                    array('id' => $aTeamData['id']));
        }
        
        return $bResult;
    }    
}

/*******************************************************************************
 *                              END OF FILE                                    												*
 ******************************************************************************/
