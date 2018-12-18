<?php
//Appeler le modele

class Accueil_Controller{
    
    public function showRecettes(){

        require_once("Accueil/models/Accueil_Model.php");
        $model = new Accueil_Model();
        $Recette1 = $model->getRecette1();
        $Recette2 = $model->getRecette2();
        $Recette3 = $model->getRecette3();
        $Recette4 = $model->getRecette4();
        $Recette5 = $model->getRecette5();
        $Recette6 = $model->getRecette6();

        require_once("Accueil/views/Accueil_View.phtml");
        
    }
    
    public function deconnecter(){
        
        $nom = 'NomUser';
        if (isset($_COOKIE[$nom])) {
            unset($_COOKIE[$nom]);
            setcookie($nom, '', time() - 3600, '/'); // empty value and old timestamp
            
            echo "<script type='text/javascript'>
                document.location.replace('Index.php?action=showRecettes');
                </script>";  
            
        }
    }
    
    
}


?>