<?php
namespace app\Entity;

/**
 *
 * @author nicohay
 *        
 */
use core\Entity\Entity;

class CategoryEntity extends Entity
{
    
    /**
     * ************************************************************
     * 
     * renvoie l'url de  larticle avec sont id
     *
     * @return string
     * 
     * ************************************************************
     */
    public function getUrl()
    {
        
        return 'index.php?p=posts.category&id=' . $this->id;
    }
    
}