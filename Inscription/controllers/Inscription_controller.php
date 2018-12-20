<?php 
    
class Inscription_controller{
    public function showForm(){
        include_once('./Inscription/views/Inscription_view.phtml');
    }
    
    
    public function submit(){
       if(  !empty($_POST['pseudo'])  and 
            !empty($_POST['pass'])  and 
          !empty($_POST['confimpass'])  and 
          !empty($_POST['gen'])  and 
          !empty($_POST['mail'])
         ){
           
        require_once('./Inscription/models/Inscription_model.php');
       require_once('./Objets/Utilisateur.php'); 
       include_once('./Inscription/views/Inscription_view.phtml');

        
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['pass'];
        $confimpass = $_POST['confimpass'];
        
        $genre =  $_POST['gen'];
        
        $email = $_POST['mail'];
        
        $utilisateur= new Utilisateur($pseudo , $mdp, $genre, $email);
        
        //echo $utilisateur;
        $model = new Inscription_model();
        $model->sauvegarder($utilisateur);
           echo "<script>
            document.location.replace('connexion.php?action=showConnection');
            </script>";
           
       }else{
           echo "<script>
            alert('Champs vides');

            document.location.replace('inscription.php?action=showForm');
            </script>";
       }
        
    }
    
}


?>