<?php
require_once('Objets/Recette.php');

class AjoutRecette_Controller{

    private $Recette;
    public function afficherAjoutRecette(){
        require_once ('ajoutRecette/View/AjoutRecette_View.phtml');
    }
    
    public function creerRecette(){
        $this->Recette = new Recette();
        //if(isset($_POST['titre']) &&isset($_POST['typer']) &&isset($_POST['timer']) &&isset($_POST['nombrepersonne']) &&isset($_POST['descript'])){
         
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
		
		//Upload Image
		require_once 'Helper/Requette.php';
        $Requette = new Requette();
		$num = $Requette->getLastNumRecette();       
		
		if (isset($_FILES['fichier'])) $LeFic=$num.'.jpg';
			else $LeFic="";
		if(  $LeFic!="" )
		 {
		  $destination="Images/Recette/";
		  $extensions_ok = array ( ".jpg");
		  if (in_array(strtolower(substr($LeFic, -4)),$extensions_ok))
		   {
		   //========= bonne  extention on copie =====
			  copy($_FILES['fichier']['tmp_name'],$destination.$LeFic);
		   }
		   else{
			 echo "Erreur format";  
		   }
		 }
        
            
           
        //}
       // $_GET['bouton'];
    }
    

    
    
}