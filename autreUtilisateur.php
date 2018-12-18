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
require_once("./autre-utilisateur/Controller/autreUtilisateur_Controller.php");
$Controller = new autreUtilisateur_Controller();
$Controller->afficherInfosUtil();
//echo $_GET['auteur'];
?>
