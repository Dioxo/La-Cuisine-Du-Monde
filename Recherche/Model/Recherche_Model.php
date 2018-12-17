<?php

class Recherche_Model{
    

    public function chercherRecette($mot){
        require_once 'Helper/Requette.php';
        $Requette = new Requette();
        
        return $Requette->getRecherche($mot);
    }
    

    
}

?>