<?php

class Recette_Model{
    
    private $Recette;
    
    public function __construct($numRecette){      
        require_once 'Objets/Recette.php';
        $this->Recette = new Recette();
        $this->Recette->creerRecette($numRecette);
    }
    
    function getRecette() {
        return $this->Recette;
    }

    function setRecette($Recette) {
        $this->Recette = $Recette;
    }
    
}
