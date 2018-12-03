<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table
{

    protected $table = "articles";
    /**
     * *********************************************************
     * recupere les derniers articles
     *
     * @return array
     * *********************************************************
     */
    public function last()
    {
        return $this->query(" SELECT articles.id, articles.titre,articles.contenu, articles.date,
                            categories.titre as categories
                            FROM articles
                            LEFT JOIN categories ON id_categorie = categories.id
                            ORDER BY articles.date DESC");
    }
    /**
     * *********************************************************
     * retourne un article en liant la categorie associée
     *
     * @param int $id
     * @return \App\Entity\PostEntity
     * *********************************************************
     */
    public function find($id)
    {
        return $this->query("SELECT articles.id, articles.titre,articles.contenu, articles.date,
                            categories.titre as categories
                            FROM articles
                            LEFT JOIN categories ON id_categorie = categories.id
                            WHERE articles.id = ?", [$id], true);
    }
    /**
     * *********************************************************
     * recupere le dernier element de la categorie demandée
     *
     * @param int $category_id
     * @return \App\Entity\CategoryEntity
     * *********************************************************
     */
    public function lastByCategory($category_id)
    {
        return $this->query("SELECT articles.id, articles.titre,articles.contenu, articles.date,
                        categories.titre as categories
                        FROM articles
                        LEFT JOIN categories ON id_categorie = categories.id
                        WHERE articles.id_categorie = ?
                        ORDER BY articles.date DESC", [$category_id]);
    }


}
    
