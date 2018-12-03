<?php

require 'service/UserService.Class.php';
require 'service/ArticleService.Class.php';
require 'service/LeagueService.Class.php';
// require 'service/TeamService.Class.php';
// require 'service/MatchService.Class.php';

/*******************************************************************************
 * @brief Admin panel class                                                    *
 * @author Marek, Paweł                                                        *
 * @date 01.12.2018                                                            *
 ******************************************************************************/

class AdminPanel {
    var $oUserService;
    var $oArticleService;
    var $oLeagueService;
//  var $oTeamService;
//  var $oMatchService;    
    
    public function __construct() {
        $this->oUserService = new UserService();
        $this->oArticleService = new ArticleService();
        $this->oLeagueService = new LeagueService();
//      $this->oTeamService = new TeamService();
//      $this->oMatchService = new MatchService();  
    }
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
