<?php

class Commentaire_Controller{
    private $model;
    
    function afficherCommentaires(){ 
        require_once('./Commentaire/Model/Commentaire_Model.php');
        $this->model = new Commentaire_Model();
        $numRecette = $_GET['numRecette'];
        
        $commentaires = $this->model->afficherCommentaires($numRecette);
        /*print_r($commentaires);
        foreach($commentaires as $value){
            echo $value;
        }*/
        
        require_once('./Commentaire/View/Commentaire.phtml');

        
    }
    
    function ajouterCommentaire(){
        //si l'utilisateur est connecté, on ajoute le commentaire
        if(isset($_COOKIE[$nom])){
            $commentaire = $_POST['commentaire'];
            $numRecette = $_GET['numRecette'];
            echo 'numRecette: '.$numRecette;
        }
        
    }
    
    
}



?>