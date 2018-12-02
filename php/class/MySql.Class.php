<?php
/*******************************************************************************
 * @brief Global MySql class                                                   *
 * @author Marek                                                               *
 * @date 10.11.2018                                                            *
 ******************************************************************************/

class MySql {
    var $oConnect;
    var $sDefaultCharset = 'utf8';
    
    var $sHost = 'localhost';
    var $sUserLogin = 'root';
    var $sUserPassword = 'Xs3UyppeQloFZEWs';
    var $sDatabase = 'byte_sport';
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method makes connect with database.                                   *
 * @return                                                                     *
 *      none                                                                   *
 ******************************************************************************/  
    
    function connect() {
        $this->oConnect = @new mysqli($this->sHost,
                        $this->sUserLogin,
                        $this->sUserPassword,
                        $this->sDatabase);
        
        if ($this->oConnect->connect_errno) {
            echo "Fail Connect to MySQL Database... <br/>Error type: <b>" . $this->oConnect->connect_error . "</b>";
            echo "<br/><br/><b>Please try again later or contact administrator.</b><br/>";
            exit();
        } else {
            $this->setCharset($this->sDefaultCharset);
        }
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method sets charset.                                                  *
 * @return                                                                     *
 *      none                                                                   *
 ******************************************************************************/  
    
    function setCharset($sCharset) {
    $sQuery = "SET NAMES '$sCharset'";
    $this->query($sQuery);
  }

/*******************************************************************************
 * @brief                                                                      *
 *       Method sends query to database.                                       *
 * @return                                                                     *
 *      - array with result                                                    *
 ******************************************************************************/  
    
    private function query($sQuery) {
        return $this->oConnect->query($sQuery);
   }
  
/*******************************************************************************
 * @brief                                                                      *
 *       Method puts values into query.                                        *
 * @params                                                                     *
 *      - array with fields                                                    *
 * @return                                                                     *
 *      -Query                                                                 *
 ******************************************************************************/  
   
    function setValues($aFields) {
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
  
/*******************************************************************************
 * @brief                                                                      *
 *       Method sets WHERE section in query.                                   *
 * @params                                                                     *
 *      - $aIs - array with fields                                             *
 *      - $sOperators - operator                                               *
 * @return                                                                     *
 *      - Query                                                                *
 ******************************************************************************/      
    
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
  
/*******************************************************************************
 * @brief                                                                      *
 *       Method sets SET section in query.                                     *
 * @params                                                                     *
 *      - $aFields - array with fields                                         *    
 * @return                                                                     *
 *      - Query                                                                *
 ******************************************************************************/   

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
  
/*******************************************************************************
 * @brief                                                                      *
 *       Method sets fields in query.                                          *
 * @params                                                                     *
 *      - $aFields - array with fields                                         *
 * @return                                                                     *
 *      - Query                                                                *
 ******************************************************************************/   
  
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
  
/*******************************************************************************
 * @brief                                                                      *
 *       Method sets ORDER BY section in query.                                *
 * @params                                                                     *
 *      - aSort - array with fields.                                           *
 * @return                                                                     *
 *      - Query                                                                *
 ******************************************************************************/   
  
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
  
/*******************************************************************************
 * @brief                                                                      *
 *       Method for SELECT records from table                                  *
 * @params                                                                     *
 *      - $sTable - table name                                                 *
 *      - $iLimit - limit records (null = all)                                 *
 *      - $aIf - array with fields for WHERE section (null = none)             *
 *      - $aSort - array with fields for ORDER BY (null = none)                *
 *      - $aFields - array with wanted fields (null = all)                     *
 *      - $sOperator - operator                                                *
 * @return                                                                     *
 *      - array with all wanted fields (false if error)                        *
 ******************************************************************************/   
  
  function select($sTable, $iLimit = null, $aIf = null, $aSort = null, 
                                           $aFields = null, $sOperator = null) {
      
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
  
/*******************************************************************************
 * @brief                                                                      *
 *       Method for SELECT one record from table                               *
 * @params                                                                     *
 *      - $sTable - table name                                                 *
 *      - $aIf - array with fields for WHERE section (null = none)             *
 *      - $aSort - array with fields for ORDER BY (null = none)                *
 *      - $aFields - array with wanted fields (null = all)                     *
 *      - $sOperator - operator                                                *
 * @return                                                                     *
 *      - array with all wanted fields (false if error)                        *
 ******************************************************************************/ 
  
    function selectOne($sTable, $aIf = null, $aSort = null, $aFields = null, 
                                                            $sOperator = null) {
        
    $aReturn = array();
    $aReturn = $this->select($sTable, 1, $aIf, $aSort, $aFields, $sOperator);

    return $aReturn;
  }
  
/*******************************************************************************
 * @brief                                                                      *
 *       Method for INSERT one record into table                               *
 * @params                                                                     *
 *      - $sTable - table name                                                 *
 *      - $aFields - array with wanted fields (null = all)                     *
 * @return                                                                     *
 *      - insert id when success                                               *
 *      - error message when fail                                              *
 ******************************************************************************/  
  
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
  
/*******************************************************************************
 * @brief                                                                      *
 *       Method for UPDATE records from table                                  *
 * @params                                                                     *
 *      - $sTable - table name                                                 *
 *      - $aIf - array with fields for WHERE section (null = none)             *
 *      - $aFields - array with wanted fields                                  *
 *      - $sOperator - operator (null = none)                                  *
 * @return                                                                     *
 *      - true if success                                                      *
 *      - error if fail                                                        *
 ******************************************************************************/ 
  
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
  
/*******************************************************************************
 * @brief                                                                      *
 *       Method for DELETE records from table                                  *
 * @params                                                                     *
 *      - $sTable - table name                                                 *
 *      - $aIf - array with fields for WHERE section (null = none)             *
 *      - $sOperator - operator (null = none)                                  *
 * @return                                                                     *
 *      - true if success                                                      *
 *      - error if fail                                                        *
 ******************************************************************************/ 
  
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
  
/*******************************************************************************
 * @brief                                                                      *
 *       Method for execute other query                                        *
 * @params                                                                     *
 *      - $sQuery - query                                                      *
 * @return                                                                     *
 *      - array with result of executed query                                  *
 *      - false if fail                                                        *
 ******************************************************************************/ 
  
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

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
