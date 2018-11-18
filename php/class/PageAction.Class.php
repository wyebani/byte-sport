<?php
/**
 * Description of PageAction
 *
 * @author Marek
 */

require 'MySql.Class.php';
require '../../libs/Smarty.class.php';

class PageAction {
    var $oSmarty;
    var $oMySql;
    var $aMessage;
    var $aSuccess;
    var $aWarning;
    var $aError;
    
    function __construct() {
        $this->oSmarty = new Smarty();
        $this->oMySql = new MySql();
        $this->oMySql->connect();
        
    }
    
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
  
  function getSmarty() {
      return $this->oSmarty;
  }
  
}
