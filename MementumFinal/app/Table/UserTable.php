<?php
namespace app\Table;

/**
 *
 * @author nicohay
 *        
 */
use core\Table\Table;


class UserTable extends Table
{
    
    protected $table = "user";
    
    
    public function findToken($id , $token ){
        
        return $this->query("SELECT *
                            FROM {$this->table} WHERE id = ?
                            AND reset_token IS NOT NULL
                            AND reset_token = ?
                            AND NOW() < reset_at + INTERVAL 24 hour", [$id,$token], false);
    }
}
