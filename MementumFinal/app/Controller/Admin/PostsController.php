<?php
namespace app\Controller\Admin;




/**
 *
 * @author nicohay
 *        
 */
class PostsController extends AppController
{
    public function __construct(){
        
        parent::__construct();
        
        $this->loadModel('Post');

        
    }

    /**
     ********************************************************************
     *
     * genere la vue de l'index
     * et recupere les articles postés
     * 
     * @return VOID
     * 
     ********************************************************************
     */
    public function index() {
        
        $posts = $this->Post->all();
        
      
        $this->render('admin.posts.index', compact( 'posts'  ));
    }
    
    /**
     ********************************************************************
     *
     * permet de gerer l'ajout d' un article
     *
     * @return void
     * 
     ********************************************************************
     */
    public function add() {
        $errors= FALSE;
        
        if(!empty($_POST['add_form'])) {
            $result = $this->Post->create([
                'titre'         => $_POST['titre_add'],
                'contenu'       => $_POST['contenu_add'],
              
            ]);
            if($result) {
                $errors= TRUE;
                
                return $this->index();
            }
        }
       
        
        $this->render('admin.posts.add' , compact('errors'));
    }
    
    /**
     ********************************************************************
     *
     * permet d'editer / modifier un article
     *
     * @return VOID
     * 
     ********************************************************************
     */
    public function edit() {
         $errors = TRUE;
        
        if(!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
                'titre'         =>   $_POST['titre_edit'],
                'contenu'       =>   $_POST['contenu_edit'],
              
            ]);
            
            if($result) {
                
                $errors = FALSE;
                
                return $this->index();
            }
        }

        $post = $this->Post->find(($_GET['id']));

        
        $this->render('admin.posts.edit', compact( 'post' , 'errors' ));
        
    }
    
    /**
     ********************************************************************
     *
     * permet d'effacerun article
     *
     * @return VOID
     * 
     ********************************************************************
     */
    public function delete() {
        
        if(!empty($_POST)) {
            
            $this->Post->delete($_POST['id']);
            
            return $this->index();
        }
        
    }
    
    /**
     ********************************************************************
     *
     * permet d'afficher un article en particulier
     * 
     *
     * @return VOID
     *
     ********************************************************************
     */
    public function show() {
        
        $post       =   $this->Post->find($_GET['id']);
        
        if ( $post === false ) {
            
            $this->notFound();
        }
        
        $this->render( 'admin.posts.show' , compact( 'post' ) );
    }
}

