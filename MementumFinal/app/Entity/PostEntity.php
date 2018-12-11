<?php
namespace app\Entity;

/**
 *
 * @author nicohay
 *        
 */

use core\Entity\Entity;

class PostEntity extends Entity
{
    
    
    
    
    /**
     * ************************************************************
     * 
     * renvoie l'url de l'article avec sont id
     *
     * @return string
     * 
     * ************************************************************
     */
    public function getUrl()
    {
        
        return 'index.php?p=admin.posts.show&id=' . $this->id;
    }
    /**
     * ************************************************************
     *
     * renvoie un extrait
     *
     * @return string
     *
     * ************************************************************
     */
    public function getExtrait()
    {
        $html = '<p>' . \substr($this->contenu, 0, 50) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
        return $html;
    }
    
    /**
     * ************************************************************
     *
     * renvoie le titre
     *
     * @return string
     *
     * ************************************************************
     */
    public function getTitre(){
        
        return $this->titre;
    }
    
    /**
     * ************************************************************
     *
     * renvoie le contenu
     *
     * @return string
     *
     * ************************************************************
     */
    public function getContenu(){
        
        return $this->contenu;
    }

}
