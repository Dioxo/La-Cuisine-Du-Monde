<?php

class Modification_Model{
    private $requette;
    public function confirmerMDP($mdp){
        require_once 'Helper/Requette.php';
        $this->requette = new Requette();
        $flag = $this->requette->comparerMDP($mdp);
        return $flag;
    }
    
    public function changerInfo($newMdp,$nouveauEmail){
        require_once 'Helper/Requette.php';
        $this->requette = new Requette();
        $this->requette->changerInfoUSer($newMdp,$nouveauEmail);
    }
    
}



?>