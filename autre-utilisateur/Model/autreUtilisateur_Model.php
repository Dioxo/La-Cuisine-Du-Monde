<?php

class autreUtilisateur_model
{
    private $mailUtilisateur;
    private $nombreRec;
    private $id;
    private $recette;
    public function __construct()
    {
        require_once('Helper/Requette.php');
        $Requette = new Requette();
        
        $mailUser= $Requette->getMailAuteurByID();
        //print_r($mailUser);
        $this->mailUtilisateur = $mailUser[0]['Email'];
        //print_r($this->mailUtilisateur);
        $this->nombreRec = $Requette->getNombreReceteByID();
      //  print_r($this->nombreRec);
       // print_r($this->nombreRec);
       // $this->id = $Requette->getUserIDByMail();
        //print_r($this->id);
        $this->recette = $Requette->afficherRecetteAutreUser();
       // print_r($this->recette);
    }
    public function getMailPerso()
    {
        return $this->mailUtilisateur;
    }
    public function getNombreRecettePerso()
    {
        return $this->nombreRec;
    }
    public function getRecette()
    {
        return $this->recette;
    }
}