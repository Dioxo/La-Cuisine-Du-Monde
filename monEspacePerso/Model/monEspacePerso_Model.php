<?php

class monEspacePerso_Model
{

    private $Pseudo;
    private $Recette;
    
    public function __construct()
    {
        require_once('Helper/Requette.php');
        $Requette = new Requette();
        $IdUser =  $Requette->getUserID();
        
        
        $this->Pseudo =  $Requette->getAuteurByID($IdUser[0]['numUser']);
        
        $this->Recette = $Requette->afficherRecetteUser();
       // print_r($this->Recette);
        
    }
    
    public function getInfoPerso()
    {
        return $this->Pseudo[0]['Pseudo'];
    }
    public function getRecette()
    {
        return $this->Recette;
    }
    

    
}
?>