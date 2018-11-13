<?php



class Vue {
    
    // Nom du fichier associé à la vue
    private $fichier;
    
    
    
    public function __construct($action) {
        
        $this->fichier = "vue/Vue" . $action . ".php";
    }
    
    // Génère et affiche la vue
    public function generer($donnees = []) {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('vue/VueGabarit.php',
        array( 'contenu' => $contenu));
        
        echo $vue;
    }
    public function genererAdmin($donnees = []) {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('vue/VueGabaritAdmin.php',
        array( 'contenu' => $contenu));
        
        echo $vue;
    }
    
    // Génère un fichier vue et renvoie le résultat produit
    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            
            ob_start();
            // Inclut le fichier vue
            
            require $fichier;
            
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}