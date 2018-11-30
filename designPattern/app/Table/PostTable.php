<?php

namespace App\table;

use \Core\Table\Table;

class PostTable extends Table{

    protected $table = "articles";
    /**
     * *********************************************************
     * recupere les derniers articles
     *
     * @return array
     * *********************************************************
     */
    public function last(){

       
        return $this->query(" SELECT articles.id, articles.titre,                    articles.contenu, articles.date,
                            categories.titre as categories
                            FROM articles
                            LEFT JOIN categories ON id_categorie = categories.id
                            ORDER BY articles.date DESC");
    }


    }
    
