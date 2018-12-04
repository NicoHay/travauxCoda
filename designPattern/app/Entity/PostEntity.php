<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity
{




    /**
     * ************************************************************
     * renvoie l'url de l'article avec sont id
     *
     * @return string
     * ************************************************************
     */
    public function getUrl()
    {

        return 'index.php?p=posts.show&id=' . $this->id;
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
        $html = '<p>' . \substr($this->contenu, 0, 100) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
        return $html;
    }
    public function getTitre(){

        return $this->titre;
    }
    
    public function getContenu(){

        return $this->contenu;
    }
}