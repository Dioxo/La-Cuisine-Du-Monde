<?php

class Recette_Model{
    
    private $Recette;
    
    public function __construct(){        
        require_once 'Objets/Recette.php';
        $this->Recette = new Recette(1);
    }
    
    function getRecette() {
        return $this->Recette;
    }

    function setRecette($Recette) {
        $this->Recette = $Recette;
    }
    
}
