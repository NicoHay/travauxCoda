<?php
namespace core\Entity;

/**
 *
 * @author nicohay
 *        
 */
class Entity
{
    
    public function __get($key) {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}

