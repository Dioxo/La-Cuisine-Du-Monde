<?php 
    
class Inscription_controller{
    public function showForm(){
        include_once('./Inscription/views/Inscription_view.phtml');
    }
    
    
    public function submit(){
       require_once('./Inscription/models/Inscription_model.php');
       require_once('./Objets/Utilisateur.php'); 
       include_once('./Inscription/views/Inscription_view.phtml');

        //pseudo, mdp, genre, email
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['pass'];
        $genre =  $_POST['gen'];
        $email = $_POST['mail'];
        
        $utilisateur= new Utilisateur($pseudo , $mdp, $genre, $email);
        
        //echo $utilisateur;
        $model = new Inscription_model();
        $model->sauvegarder($utilisateur);
    }
    
}


?>