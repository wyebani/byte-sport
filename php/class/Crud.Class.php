<?php

/*******************************************************************************
 * @brief Class with global methods for Insert, Select, Update, Delete         *
 * @author Marek                                                               *
 * @date 01.12.2018                                                            *
 ******************************************************************************/

class Crud extends PageAction {
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method adds new recrod into table.                                    *
 * @params:                                                                    *
 *      $sTable - table name                                                   *
 *      $aData - array with fields                                             *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/      
    
    public function addOne($sTable, $aData) {
        if(!empty($sTable) && !empty($aData)) {
            return $this->oMySql->insert($sTable, $aData);
        }
        return false;
    }

/*******************************************************************************
 * @brief                                                                      *
 *       Method adds all objects into database                                 *
 * @params:                                                                    *
 *      $sTable - table name                                                   *
 *      $aData - array with arrays of fields                                   *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/     
 
    public function addAll($sTable, $aData) {
        $bResult = false;
        
        if(!empty($sTable) && !empty($aData)) {            
            foreach ($aData as $aRecord) {
                if($bResult) {
                    $bResult = $this->addOne($sTable, $aRecord);
                }
                else {
                    break;
                }
            }          
        }
        
        return $bResult;
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method returns values from table.                                     *
 * @params:                                                                    *
 *      $sTable - table name                                                   *
 * @returns:                                                                   *
 *      - array with all fields from table                                     *
 *      - null when fail                                                       *
 ******************************************************************************/    
    
    public function getAll($sTable) {
        if(!empty($sTable)) {
            return $this->oMySql->select($sTable);
        }
        
        return null;
    }

/*******************************************************************************
 * @brief                                                                      *
 *       Method returns one record from table                                  *
 * @params:                                                                    *
 *      $sTable - table name                                                   *
 *      $iId - id of record                                                    *
 * @returns:                                                                   *
 *      - array with all fields from table                                     *
 *      - null when fail                                                       *
 ******************************************************************************/ 
    
    public function getById($sTable, $iId) {
        if(!empty($sTable) && $iId != null) {
            return $this->oMySql->selectOne($sTable, array('id' => $iId));
        }
        
        return null;
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method updates object into table.                                     *
 * @params:                                                                    *
 *      $sTable - table name                                                   *
 *      $aFields - array with fields                                           *
 *      $aWhere - array with fields for WHERE section in query                 *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/
    
    public function update($sTable, $aFields, $aWhere) {
        if(!empty($sTable) && !empty($aFields) && !empty($aWhere)) {
            return $this->oMySql->update($sTable, $aFields, $aWhere);
        }
        
        return false;
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method deletes object from table.                                     *
 * @params:                                                                    *
 *      $sTable - table name                                                   *
 *      iId - id of record in table                                            *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/
    
    public function delete($sTable, $iId) {
        if(!empty($sTable) && $iId != null) {
            return $this->oMySql->delete($sTable, array('id' => $iId));
        }
        
        return false;
    }
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
