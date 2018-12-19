<?php

class Modification_Controller{
    
    public function confirmerMDP(){
       require_once("./Modification/Model/Modification_Model.php");
        $model = new Modification_Model();
        
        //Si la mdp entré pas l'utilisateur est egal à celle de la BDD, on peux changer les mdp
        if($model->confirmerMDP($_POST['LastMDP']) == 1){
            $this->changerInfo();
        }else{
            echo "<script>
            alert('Mot De passe mauvaise');
            document.location.replace('modifierInfo.php');
            </script>";
        }
    }
    
    public function afficherForm(){
        require_once("./Modification/View/Modification.phtml");
    }
    
    public function changerInfo(){
        $newMdp = $_POST['NewMdp'];
        echo 'asdads'.$newMdp;
        $confirmationNewMdp = $_POST['confirmationNewMdp'];
        $nouveauEmail = $_POST['Email'];
        $confirmationEmail = $_POST['confirmationEmail'];
        
        //Si le MDP or email est differents a chaque confirmation
        if(strcmp($confirmationNewMdp,$newMdp) !== 0 ||
            strcmp($nouveauEmail,$confirmationEmail) !==0
          ){
            
            echo '<script>
                alert("Les Mot de passe ou les emails sont incorrects");
            </script>';
        }else{
			//Upload Image
			require_once 'Helper/Requette.php';
			$Requette = new Requette();
			$IdUser =  $Requette->getUserID();        
			$num = $IdUser[0]['numUser'];
			
			if (isset($_FILES['fichier'])) $LeFic=$num.'.jpg';
				else $LeFic="";
			if(  $LeFic!="" )
			 {
				$destination="Images/User/";
				copy($_FILES['fichier']['tmp_name'],$destination.$LeFic);
			 }
			 
			//Modifier infos
            require_once("./Modification/Model/Modification_Model.php");
            $model = new Modification_Model();
            $model->changerInfo($newMdp,$nouveauEmail);		
        }
        
    }
}


?>