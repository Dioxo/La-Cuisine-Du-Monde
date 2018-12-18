<?php

class Connexion_model{

    public function confirmation($username, $password){
        require_once('Helper/Requette.php');
        $Requette = new Requette();
        $confirmation = $Requette->confirmerUtilisateur($username, $password);
        return $confirmation;
    }
    
    
}


?>