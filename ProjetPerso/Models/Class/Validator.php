<?php


class Validator{




/**
 * Undocumented function
 *
 * @param [type] $value
 * @return void
 */
        static function testInput(string $value){
		
            return htmlspecialchars($value);
            
        

    }

    static function hash($value){

        return $value = password_hash($value, PASSWORD_BCRYPT);
    }


     
}