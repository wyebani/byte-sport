<?php

require __DIR__.'/MySql.Class.php';
require __DIR__.'/../../libs/Smarty.class.php';

/*******************************************************************************
 * @brief Parent class with Smarty and DataBase objects.                       *
 * @author Marek                                                               *
 * @date 10.11.2018                                                            *
 ******************************************************************************/

class PageAction {
    var $oSmarty;
    var $oMySql;
    var $aMessage;
    var $aSuccess;
    var $aWarning;
    var $aError;
    
/*******************************************************************************
 * @brief                                                                      *
 *       Default constructor sets the Samarty object, templates dir            *
 *       and init database connection.                                         *
 ******************************************************************************/     
    
    function __construct() {
        $this->oSmarty = new Smarty();
		$this->oSmarty->setTemplateDir(__DIR__."/../../templates");
		$this->oSmarty->setCompileDir(__DIR__."/../../templates_c");
        $this->oMySql = new MySql();
        $this->oMySql->connect();
        
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method sets messages into Smarty object.                              *
 * @return                                                                     *
 *      none                                                                   *
 ******************************************************************************/ 
    
    protected function _setMesagges() {
        $this->oSmarty->assign('aMessage', $this->aMessage);
        $this->oSmarty->assign('aSuccess', $this->aSuccess);
        $this->oSmarty->assign('aWarning', $this->aWarning);
        $this->oSmarty->assign('aError', $this->aError);
        $this->oSmarty->assign('aEnteredData', $_REQUEST);
        $this->oSmarty->assign('aServer', $_SERVER);
        $this->oSmarty->assign('aSession', $_SESSION);
        $this->oSmarty->assign('aCookie', $_COOKIE);
  }
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
