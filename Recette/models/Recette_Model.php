<?php

class Recette_Model{

    private $Requette;
    public function __construct()
    {
    require_once 'db/Db.php';
    require_once 'Helper/Requette.php';
    $this->db = Db::connecter();
    $this->Recette = array();
    }
    
    public function ajouterRecette()
    {
        require_once 'Helper/Requette.php';
        $this->Requette = new Requette();
        
        
        
    }
    
    
}
