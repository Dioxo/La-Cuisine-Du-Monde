<?php
class autreUtilisateur_Controller
{
    public function afficherInfosUtil(){
        require_once('autre-utilisateur/Model/autreUtilisateur_Model.php');
        $model = new autreUtilisateur_model();
         
        require_once('./autre-utilisateur/View/autreUtilisateur.phtml');
       
    }
    
}