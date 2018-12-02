<?php

namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity
{

    /**
     * ************************************************************
     * renvoie l'url de  larticle avec sont id
     *
     * @return string
     * ************************************************************
     */
    public function getUrl()
    {

        return 'index.php?page=posts.category&id=' . $this->id;
    }

}