<?php

class Inscription_model{
    
    public function sauvegarder($utilisateur){
        //echo $utilisateur;
        require_once('Helper/Requette.php');
        $Requette = new Requette();
        $Requette->creerUtilisateur($utilisateur);
    }
    
    
    
}






