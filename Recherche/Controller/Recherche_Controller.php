<?php



class Recherche_Controller{
    
    public function showRecettes(){

        require_once("Recherche/Model/Recherche_Model.php");
        $model = new Recherche_Model();
        $Recette = $model->chercherRecette($_GET['mot']);
        print_r($Recette);

        //require_once("Accueil/views/Accueil_View.phtml");
        
    }
    
    
}




?>