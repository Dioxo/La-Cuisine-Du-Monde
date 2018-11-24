<?php

class AjoutRecette_Controller{
    private $Recette;
    public function afficherAjoutRecette(){
        require_once ('ajoutRecette/View/AjoutRecette_View.phtml');
    }
    
    public function creerRecette(){
       $this->Recette->setTitre = $_GET['titre'];
       $this->Recette->setType = $_GET['typer'];
       $this->Recette->setTemps = $_GET['timer'];
       $this->Recette->setNb_De_Personne = $_GET['nombrepersonne'];
       $this->Recette->setDescription = $_POST['descript'];
       // $_GET['bouton'];
  
    }
    
    
    
}
    
    
    
}