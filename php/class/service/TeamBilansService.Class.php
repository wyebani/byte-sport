<?php

require __DIR__.'/../Crud.Class.php';
require __DIR__.'/TeamService.Class.php';

/*******************************************************************************
 * @brief Service for entity TeamBilans                                        *
 * @author Marek                                                               *
 * @date 17.12.2018                                                            *
 ******************************************************************************/

class TeamBilansService extends Crud {
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets league table from database.                               *
 * @params:                                                                    *
 *      - iLeagueId - league ID                                                *
 * @returns:                                                                   *
 *      - array with teams sorted by points                                    *
 *      - false when fail                                                      *
 ******************************************************************************/   
    
    function getAllByLeagueSorted($iLeagueId) {
        if($iLeagueId) {
            $oTeamService = new TeamService();
            $aTeams = $oTeamService->getTeamByLeagueId($iLeagueId);
            $aTeamsBilans = array();
            
            if($aTeams) {
                foreach($aTeams as $key => $value) {
                    array_push($aTeamsBilans, $oTeamService->getById('team_bilans', $value['id']));
                }
                
                usort($aTeamsBilans, "my_cmp");
                return $aTeamsBilans;
            }
            
            return false;
        }
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method compares two teams points.                                     *
 * @params:                                                                    *
 *      - team_1                                                               *
 *      - team_2                                                               *
 * @returns:                                                                   *
 *      - -1 when team_1 has more points that team_2                           *
 *      -  0 when teams have the same number of points                         *
 *      -  1 when team_2 has more points that team_1                           *
 ******************************************************************************/       
    
    function my_cmp($team_1, $team_2) {
        if($team_1['points'] == $team_2['points']) {
            return 0;
        }
        return ($team_1['points'] < $team_2['points']) ? -1 : 1;
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets team bilans.                                              *
 * @params:                                                                    *
 *      - iTeamId - team ID                                                    *
 * @returns:                                                                   *
 *      - array with team scores                                               *
 *      - false when fail                                                      *
 ******************************************************************************/    
    
    function getTeamBilans($iTeamId) {
        if($iTeamId) {
            return $this->getById('team_bilans', $iTeamId);
        }
        
        return false;
    }
}
