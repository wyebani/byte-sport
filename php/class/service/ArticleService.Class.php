<?php

require_once __DIR__.'/../Crud.Class.php';

/*******************************************************************************
 * @brief Service for entity Article                                           *
 * @author Marek                                                               *
 * @date 03.12.2018                                                            *
 ******************************************************************************/

class ArticleService extends Crud {
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets all Articles from database.                               *
 * @params:                                                                    *
 *      - none                                                                 *
 * @returns:                                                                   *
 *      - array with users                                                     *
 *      - false when fail                                                      *
 ******************************************************************************/
    
    public function getAllArticles() {
        return $this->getAll('article');
    }    
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method gets one Article from database.                                *
 * @params:                                                                    *
 *      - $iId - article ID                                                    *
 * @returns:                                                                   *
 *      - array with users                                                     *
 *      - false when fail                                                      *
 ******************************************************************************/
    
    public function getArticle($iId) {
        if($iId) {
            return $this->getById('article', $iId);
        } else {
            return false;
        }
    }     
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method adds new article into database.                                *
 * @params:                                                                    *
 *      -$aArticleData                                                         *
 * @returns:                                                                   *
 *      - article ID when success                                              *
 *      - false when fail                                                      *
 ******************************************************************************/  
    
    public function addNewArticle($aArticledata) {
        if(empty($aArticledata)) {
            return false;
        }
        
        return $this->addOne('article', $aArticledata);
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method deletes article from database.                                 *
 * @params:                                                                    *
 *      -$iId - article ID                                                     *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/ 

    public function deleteArticle($iId) {
        if($iId) {
            return false;
        }
        
        return $this->delete('article', $iId);
    }
    
/*******************************************************************************
 * @brief                                                                      *
 *       Method for update article.                                            *
 * @params:                                                                    *
 *      -$aArticleData - array with article fields                             *
 * @returns:                                                                   *
 *      - true when success                                                    *
 *      - false when fail                                                      *
 ******************************************************************************/

    public function updateArticle($aArticleData) {
        if(empty($aArticleData)) {
            return false;
        }
        
        return $this->update('article', 
                    array('title' => $aArticleData['title'],
                        'content' => $aArticleData['content'],
                        'author_id' => $aArticleData['author_id'],
                        'league_id' => $aArticleData['league_id'],
                        'date' => $aArticleData['date']),
                    array('id' => $aArticleData['id']));
    }  
}

/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
