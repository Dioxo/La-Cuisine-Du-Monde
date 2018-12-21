<?php

require_once('Helper/Requette.php');
$Requette = new Requette();

if(isset($_GET['action'])){
    $action = $_GET['action'];
    $action();
}

    function getRecette(){
        global $Requette;
        print_r($Requette->getRecette($_GET['numRecette']));
    }

    function getTypeRecette(){
        global $Requette;
        print_r($Requette->getType($_GET['numRecette']));
    }


    function getContient(){
        global $Requette;
        print_r($Requette->getContient($_GET['numRecette']));
    }

    function creerUtilisateur($utilisateur){
        global $Requette;
        print_r($Requette->creerUtilisateur($utilisateur));
    }
    
    function ajouterRecette($Recette){
        global $Requette;
        print_r($Requette->ajouterRecette($Recette));
    }
    
    function confirmerUtilisateur(){
        global $Requette;
        print_r($Requette->confirmerUtilisateur($_GET['userName'], $_GET['password']));
    }
    
    function getUserID(){
        global $Requette;
         print_r($Requette->getUserID());
    }
    
    function getAuteurByID(){
        global $Requette;
         print_r($Requette->getAuteurByID($_GET['id']));
    }
    

    function ajouterCommentaire($commentaire, $numRecette, $numUser){
        global $Requette;
         print_r($Requette->ajouterCommentaire($commentaire, $numRecette, $numUser));
     }
    

    function afficherCommentaires(){
        global $Requette;
         print_r($Requette->afficherCommentaires(($_GET['numRecette'])));
     }
    

    function afficherRecetteUser(){
        global $Requette;
         print_r($Requette->afficherRecetteUser());
     }
    function getMailAuteurByID(){
        global $Requette;
        print_r($Requette->getMailAuteurByID());
        
    }
    function getUserIDByMail(){
        global $Requette;
        print_r($Requette->getUserIDByMail());
    }
    function comparerMDP($mdp){
        global $Requette;
        print_r($Requette->comparerMDP($mdp));
    }
    function changerInfoUSer($newMdp,$nouveauEmail){
        global $Requette;
        print_r($Requette->changerInfoUSer($newMdp,$nouveauEmail));
    }
    function getRecherche(){
        global $Requette;
        print_r($Requette->getRecherche($_GET['mot']));
    }
    function getNombreReceteByID(){
        global $Requette;
        print_r($Requette->getNombreReceteByID());
    }
    function afficherRecetteAutreUser(){
        global $Requette;
        print_r($Requette->afficherRecetteAutreUser());

    }
    function getOtherUserID(){
        global $Requette;
        print_r($Requette->getOtherUserID());
    }


?>