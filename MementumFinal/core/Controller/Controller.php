<?php
namespace core\Controller;

/**
 *
 * @author nicohay
 *        
 */
class Controller
{
    
    protected $viewPath;
    protected $template;
    
    /**
     * ************************************************************
     *
     * Fonction qui genere la vue avec un ob_start 
     * + envoie d'un tableau associatif de variables.
     * + variable $content definie.
     *
     * @param STRING $view nom de la page 
     *              (sous la forme Controller . Function) 
     * @param ARRAY $variables tableau associatif 
     * 
     * @return VOID 
     *
     * ************************************************************
     */
    
    protected function render( $view , $variables = [] ) {
        
        ob_start();
      
        extract($variables);
        
        require ( $this->viewPath . str_replace( '.' , '/' , $view ). '.php') ;
        
        $content = ob_get_clean();
      
        
        require ( $this->viewPath . 'templates/' . $this->template . '.php') ;
        
    }
    
    /**
     * ************************************************************
     *
     * genere un header 403 forbidden 
     * 
     * @return VOID 
     *
     * ************************************************************
     */
    protected function forbidden(){
        
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }
    
    /**
     * ************************************************************
     *
     * genere un header 404 not Found
     *
     * @return VOID
     *
     * ************************************************************
     */
    protected function notFound(){
        
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }
}

