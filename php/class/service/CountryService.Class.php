<?php

require_once __DIR__.'/../Crud.Class.php';

/*******************************************************************************
 * @brief Service for entity Contry                                            *
 * @author Marek                                                               *
 * @date 03.12.2018                                                            *
 ******************************************************************************/

class CountryService extends Crud {
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets all Countries from database.                              *
 * @params:                                                                    *
 *      - none                                                                 *
 * @returns:                                                                   *
 *      - array with countries                                                 *
 *      - false when fail                                                      *
 ******************************************************************************/
    
    public function getAllCountries() {
        return $this->getAll('country');
    }     
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets one Country from database.                                *
 * @params:                                                                    *
 *      - $iId - country ID                                                    *
 * @returns:                                                                   *
 *      - array with country                                                   *
 *      - false when fail                                                      *
 ******************************************************************************/
    
    public function getCountry($iId) {
        return $this->getById('country', $iId);
    }   
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method adds new country into database.                                *
 * @params:                                                                    *
 *      -$sCountryName - country name                                          *
 * @returns:                                                                   *
 *      - country ID when success                                              *
 *      - false when fail                                                      *
 ******************************************************************************/    
    
    public function addNewCountry($sCountryName) {
        if(empty($sCountryName)) {
            return false;
        }
        
        $iId = $this->addOne('country',
                        array('name' => $sCountryName));
        
        if($iId != null) {
            return $iId;
        } else {
            return false;
        }
    }   
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method deletes country from database.                                 *
 * @params:                                                                    *
 *      -$iId - country ID                                                     *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/    
    
    public function deleteCountry($iId) {      
        if($iId != null) {
            return $this->delete('country', $iId);
        } else {
            return false;
        }     
    }    
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method updates country.                                               *
 * @params:                                                                    *
 *      -$aCountryData - array with country details                            *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/

    public function updateCountry($aCountryData) {
        if(empty($aCountryData)) {
            return false;
        }
        
        return $this->update('country',
                        array('name' => $aCountryData['name']),
                        array('id' => $aCountryData['id']));
    }
    
}

