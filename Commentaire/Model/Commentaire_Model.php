<?php

class Commentaire_Model{
    private $requette;
    private $commentaires;
    function afficherCommentaires($numRecette){
        $this->requette = new Requette();
        $this->commentaires = $this->requette->afficherCommentaires($numRecette);
        return $this->commentaires;
    }
    
    function ajouterCommentaire($commentaire, $numRecette, $user){
        require_once('./Helper/Requette.php');
        $requette = new Requette();
        $numUser = $requette->getUserID()[0]['numUser'];
        $requette->ajouterCommentaire($commentaire, $numRecette, $numUser);
    }
    
}



?>