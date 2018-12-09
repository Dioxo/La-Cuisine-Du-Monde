<?php

class Commentaire_Model{
    private $requette;
    private $commentaires;
    function afficherCommentaires($numRecette){
        $this->requette = new Requette();
        $this->commentaires = $this->requette->afficherCommentaires($numRecette);
        return $this->commentaires;
    }
    
    function ajouterCommentaire(){
        require_once('./Helper/Requette.php');
        require_once('./Objets/Commentaire.php');
        $requette = new Requette();
        $commentaire = new Commentaire();
        $requette->ajouterCommentaire($commentaire);
        
        
    }
    
}



?>