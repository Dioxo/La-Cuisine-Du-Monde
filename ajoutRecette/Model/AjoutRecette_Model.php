<?php

class AjoutRecette_Model{
    
    private $Requette;
    
    public function __construct(){
        
    }
    
    public function inserterRecette($recette){
        require_once("Helper/Requette.php");
        $this->Requette = new Requette();
        $id = $this->Requette->getUserID();
        //echo $id[0]['numUser'];
        $recette->setAuteur($id[0]['numUser']);
        $this->Requette->ajouterRecette($recette);

    }
    
    
    
    
}
