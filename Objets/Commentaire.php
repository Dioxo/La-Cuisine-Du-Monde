<?php


class Commentaire{
    require_once('./Objets/Utilisateur.php');
    private $utilisateur = new Utilisateur();
    private $commentaire = "";
    private $numRecette;
    
    public function __construct($utilisateur,$comm,$numRecette){
        $this->utilisateur=$utilisateur;
        $this->commentaire=$comm;
        $this->numRecette=$numRecette;
        
    }
    
    public function getNomUtilisateur(){
        return $this->utilisateur->getNom();
    }
    
    public function getCommentaire(){
        return $this->commentaire;
    }        
        
     
    public function getNumRecette(){
        return $this->numRecette;
    }        
    
}






?>