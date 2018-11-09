<?php
/**
 * Description of MySql
 *
 * @author Marek
 */

class MySql {
    var $oConnect;
    var $sDefaultCharset = 'utf8';
    
    var $sHost = 'localhost';
    var $sUserLogin = 'root';
    var $sUserPassword = '';
    var $sDatabase = 'byte_sport';
    
    function connect() {
        $this->oConnect = @new mysqli($this->sHost, $this->sUserLogin, $this->sUserPassword, $this->sDatabase);
        
        if ($this->oConnect->connect_errno) {
            echo "Fail Connect to MySQL Database... <br/>Error type: <b>" . $this->oConnect->connect_error . "</b>";
            echo "<br/><br/><b>Please try again later or contact administrator.</b><br/>";
            exit();
        } else {
            $this->setCharset($this->sDefaultCharset);
        }
    }
    
    function setCharset($sCharset) {
    $sQuery = "SET NAMES '$sCharset'";
    $this->query($sQuery);
  }
  
    private function query($sQuery) {
    return $this->oConnect->query($sQuery);
  }
  
    function showArray($aArray) {
    echo '<div style="position: absolute; bottom: 0; left: 0;"><pre>';
    print_r($aArray);
    echo '</pre></div>';
  }
  
    function setValues($aFields)
  {
    $bFirst = true;
    $sQuery1 = '';
    $sQuery2 = '';

    if (isset($aFields)) {
      foreach ($aFields as $sKey => $sValue) {
        if ($bFirst) {
          $sQuery1 = " ( $sKey";
          $sQuery2 = " VALUES( '$sValue'";
          $bFirst = false;
        } else {
          $sQuery1 .= ", $sKey";
          $sQuery2 .= ", '$sValue'";
        }
      }

      $sQuery1 .= " )";
      $sQuery2 .= " )";
    }

    $sQuery = $sQuery1 . " " . $sQuery2;

    return $sQuery;
  }
  
    function setWhere($aIf, $sOperators) {
    $bFirst = true;
    $sQuery = '';

    if (isset($aIf)) {
      foreach ($aIf as $sKey => $sValue) {
        if ($bFirst) {
          $sQuery = " WHERE $sKey = '$sValue'";
          $bFirst = false;
        } else {
          if ($sOperators['or']) {
            $sQuery .= " OR $sKey = '$sValue'";
          } else {
            $sQuery .= " AND $sKey = '$sValue'";
          }
        }
      }
    }

    return $sQuery;
  }

  function setSet($aFields) {
    $bFirst = true;
    $sQuery = '';

    if (isset($aFields)) {
      foreach ($aFields as $sKey => $sValue) {
        if ($bFirst) {
          $sQuery = " SET `$sKey` = '$sValue'";
          $bFirst = false;
        } else {
          $sQuery .= " , `$sKey` = '$sValue'";
        }
      }
    }

    return $sQuery;
  }
  
    function setFields($aFields) {
    $iCount = count($aFields);
    $sQuery = '';

    for ($iI = 0; $iI < $iCount; $iI++) {
      $sQuery .= "`$aFields[$iI]`";
      if ($iCount > 1 AND $iI != $iCount - 1) {
        $sQuery .= ", ";
      }
    }

    return $sQuery;
  }
  
    function setOrderBy($aSort) {
    $bFirst = true;
    $sQuery = '';

    if (isset($aSort)) {
      foreach ($aSort as $sValue) {
        if ($bFirst) {
          $sQuery = " ORDER BY $sValue";
          $bFirst = false;
        } else {
          $sQuery .= ", $sValue";
        }
      }
    }

    return $sQuery;
  }
  
  function select($sTable, $iLimit = null, $aIf = null, $aSort = null, $aFields = null, $sOperator = null) {
    $aReturn = array();
    $sQuery = "SELECT ";

    if (empty($aFields)) {
      $sQuery .= "*";
    } else {
      $sQuery .= $this->setFields($aFields);
    }

    $sQuery .= " FROM `$sTable`";
    $sQuery .= $this->setWhere($aIf, $sOperator);
    $sQuery .= $this->setOrderBy($aSort);
    
    if (isset($iLimit)) {
      if ($oResult = $this->query($sQuery)) {
        if ($aReturn = $oResult->fetch_assoc()) {
          return $aReturn;
        } else {
          return false;
          $oResult->close();
        }
      } else {
        return false;
      }
    } else {
      if ($oResult = $this->query($sQuery)) {
        while ($aReturnOne = $oResult->fetch_assoc()) {
          array_push($aReturn, $aReturnOne);
        }

        $oResult->close();
      }

      if (count($aReturn) == 0) {
        return false;
      } else {
        return $aReturn;
      }
    }
  }
  
    function selectOne($sTable, $aIf = null, $aSort = null, $aFields = null, $sOperator = null) {
    $aReturn = array();
    $aReturn = $this->select($sTable, 1, $aIf, $aSort, $aFields, $sOperator);

    return $aReturn;
  }
  
    function insert($sTable, $aFields) {
    $sQuery = '';
    $sError = '';

    $sQuery = "INSERT INTO `$sTable`";
    $sQuery .= $this->setValues($aFields);

    if ($this->query($sQuery)) {
      return $this->oConnect->insert_id;
    } else {
      $sError = "Error: " . $this->oConnect->errno;
      return $sError;
    }
  }
  
    function update($sTable, $aFields, $aIf = null, $sOperator = null) {
    $sQuery = '';
    $sError = '';

    $sQuery = "UPDATE `$sTable`";
    $sQuery .= $this->setSet($aFields);
    $sQuery .= $this->setWhere($aIf, $sOperator);

    if ($this->query($sQuery)) {
      return true;
    } else {
      $sError = "Error: " . $this->oConnect->errno;
      return $sError;
    }
  }
  
    function delete($sTable, $aIf = null, $sOperator = null) {
    $sQuery = '';
    $sError = '';

    $sQuery = "DELETE FROM `$sTable`";
    $sQuery .= $this->setWhere($aIf, $sOperator);

    if ($this->query($sQuery)) {
      return true;
    } else {
      $sError = "Error: " . $this->oConnect->errno;
      return $sError;
    }
  }
  
    function otherQuery($sQuery) {
    $aReturn = array();
    if ($oResult = $this->query($sQuery)) {
      while ($aReturnOne = $oResult->fetch_assoc()) {
        array_push($aReturn, $aReturnOne);
      }

      $oResult->close();
    }

    if (count($aReturn) == 0) {
      return false;
    } else {
      return $aReturn;
    }
  }
  
}
