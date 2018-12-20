<?php
require_once('Objets/Recette.php');

class AjoutRecette_Controller{

    private $Recette;
    public function afficherAjoutRecette(){
        require_once ('ajoutRecette/View/AjoutRecette_View.phtml');
    }
    
    public function creerRecette(){
        $this->Recette = new Recette();
        if(isset($_POST['titre']) &&isset($_POST['typer']) &&isset($_POST['timer']) &&isset($_POST['nombrepersonne']) &&isset($_POST['descript']) &&
          !empty($_POST['titre']) &&!empty($_POST['typer']) &&!empty($_POST['timer']) &&!empty($_POST['nombrepersonne']) &&!empty($_POST['descript'])
          
          ){
         
        $this->Recette->setTitre($_POST['titre']);
        $this->Recette->setType($_POST['typer']);
        $this->Recette->setTemps($_POST['timer']);
        $this->Recette->setNb_De_Personne($_POST['nombrepersonne']);
        $this->Recette->setDescription($_POST['descript']);
        //echo $this->Recette;
        $this->afficherAjoutRecette();
        
        require_once("ajoutRecette/Model/AjoutRecette_Model.php");
        $model = new AjoutRecette_Model();
        $model->inserterRecette($this->Recette);
        
            
           
        }else{
             echo "<script>
                
                alert('champs vides');
                    document.location.replace('ajout.php?action=afficherAjoutRecette');

                
                </script>";
        }
       // $_GET['bouton'];
    }
    

    
    
}