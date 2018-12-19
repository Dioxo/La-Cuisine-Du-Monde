<?php



class Recherche_Controller{
    
    public function showRecettes(){

        require_once("Recherche/Model/Recherche_Model.php");
        $model = new Recherche_Model();
        
        if(isset($_GET['mot'])  and !empty($_GET['mot'])   ){
            $Recette = $model->chercherRecette($_GET['mot']);
            //$auteur = $model->chercherAuteur($_GET['mot']);
            require_once("Recherche/View/Recherche_View.phtml");
        }else{
            echo '<script>
            alert("Vous devez mettre un critére de recherche valide");
            document.location.replace("Index.php?action=showRecettes");
            </script>';
        }
    }
    
    
}




?>