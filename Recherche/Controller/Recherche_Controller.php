<?php



class Recherche_Controller{
    
    public function showRecettes(){

        require_once("Recherche/Model/Recherche_Model.php");
        $model = new Recherche_Model();
        $Recette = $model->chercherRecette($_GET['mot']);
        //$auteur = $model->chercherAuteur($_GET['mot']);
        require_once("Recherche/View/Recherche_View.phtml");
    }
    
    
}




?>