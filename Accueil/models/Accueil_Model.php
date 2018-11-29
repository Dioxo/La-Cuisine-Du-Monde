<?php
class Accueil_Model 
{
    
    private $Recette1;
    private $Recette2;
    private $Recette3;
    private $Recette4;
    private $Recette5;
    private $Recette6;

    public function __construct(){        
        require_once 'Objets/Recette.php';
        $this->Recette1 = $this->chercherRecette(1);
        $this->Recette2 = $this->chercherRecette(2);
        $this->Recette3 = $this->chercherRecette(1);
        $this->Recette4 = $this->chercherRecette(2);
        $this->Recette5 = $this->chercherRecette(3);
        $this->Recette6 = $this->chercherRecette(4);
    }
    public function chercherRecette($numRecette){
        $Recette = new Recette();
        $Recette->creerRecette($numRecette);
        return $Recette;
    }
    
    function getRecette1() {
        return $this->Recette1;
    }

    function getRecette2() {
        return $this->Recette2;
    }

    function getRecette3() {
        return $this->Recette3;
    }

    function getRecette4() {
        return $this->Recette4;
    }

    function getRecette5() {
        return $this->Recette5;
    }

    function getRecette6() {
        return $this->Recette6;
    }



}


?>