<?php
//Charger lentete du site
$nom = 'NomUser';
if(!isset($_COOKIE[$nom])) {
    //il n'y a pas de utilisateur connecte
    require_once("header.html");   
    //Chercher les meilleurs recettes
} else {
    //l'utilisateur est connecte
    require_once("headerConnecte.html");
}
require_once("./monEspacePerso/Controller/monEspacePerso_Controller.php");
$Controller = new monEspacePerso_Controller();
$Controller->afficherInfosUtil();
    
?>
