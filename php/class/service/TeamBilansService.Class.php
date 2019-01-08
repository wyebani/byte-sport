<?php

require_once __DIR__.'/../Crud.Class.php';
require __DIR__.'/TeamService.Class.php';
require_once __DIR__.'/../MatchStatus.Enum.php';
require_once __DIR__.'/../MatchPoints.Enum.php';
require_once __DIR__.'/../MatchResult.Enum.php';

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
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method updates team bilans.                                           *
 * @params:                                                                    *
 *      - aTeamBilansData - team bilans data                                   *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/     
    
    function updateTeamBilans($aTeamBilansData) {
        if(empty($aTeamBilansData)) {
            return false;
        }
        
        return $this->update('team_bilans', 
                array('matches_played' => $aTeamBilansData['matches_played'],
                    'wins' => $aTeamBilansData['wins'],
                    'draws' => $aTeamBilansData['draws'],
                    'losses' => $aTeamBilansData['losses'],
                    'scored_goals' => $aTeamBilansData['scored_goals'],
                    'lost_goals' => $aTeamBilansData['lost_goals'],
                    'points' => $aTeamBilansData['points']), 
                array('id' => $aTeamBilansData['id']));
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method updates team bilans for Host and Guest only when               *
         status_id equals to MatchStatus::FINISHED                             *
 * @params:                                                                    *
 *      - aMatchData - array with match details                                *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/     
    
    function updateTeamBilansAfterMatch($aMatchData) {
        if(empty($aMatchData)) {
            return false;
        }
        
        if($aMatchData['status_id'] != MatchStatus::FINISHED) {
            return false;
        }
        
        
        if($aMatchData['host_score'] > $aMatchData['guest_score']) {
            $iMatchResult = MatchResult::HOST_WIN;
        } else if($aMatchData['host_score'] < $aMatchData['guest_score']) {
            $iMatchResult = MatchResult::HOST_LOST;
        } else if($aMatchData['host_score'] == $aMatchData['guest_score']) {
            $iMatchResult = MatchResult::DRAW;
        }
        
        $aHostData = $this->getTeamBilans($aMatchData['host_id']);
        $aGuestData = $this->getTeamBilans($aMatchData['guest_id']);
        
        
        if(!empty($aHostData) && !empty($aGuestData)) {
            if($iMatchResult == MatchResult::DRAW) {                                   
                $aHostData['draws'] += 1;
                $aHostData['scored_goals'] += $aMatchData['host_score'];
                $aHostData['lost_goals'] += $aMatchData['guest_score'];
                $aHostData['points'] += MatchPoints::DRAW;

                $aGuestData['draws'] += 1;
                $aGuestData['scored_goals'] += $aMatchData['guest_score'];
                $aGuestData['lost_goals'] += $aMatchData['host_score'];
                $aGuestData['points'] += MatchPoints::DRAW;
            }
            else if($iMatchResult == MatchResult::HOST_WIN) {
                $aHostData['wins'] += 1;
                $aHostData['scored_goals'] += $aMatchData['host_score'];
                $aHostData['lost_goals'] += $aMatchData['guest_score'];
                $aHostData['points'] += MatchPoints::WIN;

                $aGuestData['losses'] += 1;
                $aGuestData['scored_goals'] += $aMatchData['guest_score'];
                $aGuestData['lost_goals'] += $aMatchData['host_score'];
                $aGuestData['points'] += MatchPoints::LOSE;

            }
            else if($iMatchResult == MatchResult::HOST_LOST) {
                $aHostData['losses'] += 1;
                $aHostData['scored_goals'] += $aMatchData['host_score'];
                $aHostData['lost_goals'] += $aMatchData['guest_score'];
                $aHostData['points'] += MatchPoints::LOSE;

                $aGuestData['wins'] += 1;
                $aGuestData['scored_goals'] += $aMatchData['guest_score'];
                $aGuestData['lost_goals'] += $aMatchData['host_score'];
                $aGuestData['points'] += MatchPoints::WIN;
            }
        }
        
        $bResultHost  = $this->updateTeamBilans($aHostData);
        $bResultGuest = $this->updateTeamBilans($aGuestData);
        
        if($bResultHost && $bResultGuest) {
            return true;
        } else {
            return false;
        }
    }
}
