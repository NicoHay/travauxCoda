<?php
namespace app\Table;

/**
 *
 * @author nicohay
 *        
 */


use core\Table\Table;

class PostTable extends Table
{
    
    protected $table = "informations";
    /**
     * *********************************************************
     * 
     * recupere les derniers articles
     *
     * @return array
     * 
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
     * 
     * recupere le dernier element de la categorie demandée
     *
     * @param int $category_id
     * 
     * @return \App\Entity\CategoryEntity
     * 
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

