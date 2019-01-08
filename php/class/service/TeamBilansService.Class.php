<?php

require_once __DIR__.'/../Crud.Class.php';
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
 *      - sLeagueName - league name                                            *
 * @returns:                                                                   *
 *      - array with teams sorted by points                                    *
 *      - false when fail                                                      *
 ******************************************************************************/   
    
    function getAllByLeagueSorted($sLeagueName) {
        if($sLeagueName) {
            $sQuery  = 'SELECT t.name, tb.matches_played, tb.wins, tb.draws, tb.losses, tb.scored_goals, tb.lost_goals, tb.points ';
            $sQuery .= 'FROM `team` as t ';
            $sQuery .= 'INNER JOIN `team_bilans` as tb  ';
            $sQuery .= 'ON t.id = tb.id ';
            $sQuery .= 'INNER JOIN `league` as l  ';
            $sQuery .= 'ON t.league_id = l.id ';
            $sQuery .= 'WHERE l.name = "'.$sLeagueName.'"';
            
            $aTeamsBilans = $this->oMySql->otherQuery($sQuery);
            
            if($aTeamsBilans) {
                usort($aTeamsBilans, array('TeamBilansService', 'my_cmp'));
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
 *      -  1 when team_2 has more points that team_1                           *
 ******************************************************************************/       
    
    private static function my_cmp($team_1, $team_2) {
        if($team_1['points'] == $team_2['points']) {
            if($team_1['scored_goals'] != $team_2['scored_goals']) {
               return ($team_1['scored_goals'] > $team_2['scored_goals']) ? -1 : 1;
            } else {
                return 0;
            }
        }
        return ($team_1['points'] > $team_2['points']) ? -1 : 1;
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
