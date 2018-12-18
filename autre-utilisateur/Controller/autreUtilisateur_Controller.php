<?php
class autreUtilisateur_Controller
{
    public function afficherInfosUtil(){
        require_once('autre-utilisateur/Model/autreUtilisateur_Model.php');
        $model = new autreUtilisateur_model();
        $mailUtilisateur = $model->getMailPerso();
        $nombreRec = $model->getNombreRecettePerso();
        //echo $nombreRec;
        $Recette = $model->getRecette();
      //  print_r($Recette);
        require_once('./autre-utilisateur/View/autreUtilisateur.phtml');
       
    }
    
}