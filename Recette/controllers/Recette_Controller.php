<?php
class Recette_Controller{
    
    public function afficherRecette($numRecette){
        require_once ('Recette/models/Recette_Model.php');
        $model = new Recette_Model($numRecette);
        $Recette= $model->getRecette();
        require_once ('Recette/views/Recette_View.phtml');
    }
    
    
    
}