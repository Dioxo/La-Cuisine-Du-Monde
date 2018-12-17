<?php
class MonEspacePerso_Controller{
    
    public function afficherInfosUtil(){           
        require_once('monEspacePerso/Model/monEspacePerso_Model.php');
        $model = new monEspacePerso_Model();
        $Pseudo = $model->getInfoPerso();
        $Recette = $model->getRecette();

        
    require_once('./monEspacePerso/View/monEspacePerso_View.phtml');
        
    }
   
    
}