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
        if(isset($_COOKIE['NomUser']) and !empty($_POST['commentaire']) ){
            require_once('./Commentaire/Model/Commentaire_Model.php');

            $commentaire = $_POST['commentaire'];
            $numRecette = $_GET['numRecette'];
            
            $this->model = new Commentaire_Model();
            $this->model->ajouterCommentaire($commentaire, $numRecette, $_COOKIE['NomUser']);
            
        }else{

            if(empty($_POST['commentaire'])){
                
                echo "<script>
                alert('Error, commentaire vide');
                </script>";
            }
            
            if(!isset($_COOKIE['NomUser'])){
                
                echo "<script>
                alert('Error, vous devez vous connectez pour continuer');
                </script>";
            }
            
            echo "<script>
            document.location.replace('recette.php?numRecette=".$_GET['numRecette']."&action=afficherCommentaires');
            </script>";
            
            
            
        }
    }
    
    
}



?>