<?php
$nom = 'NomUser';
if(!isset($_COOKIE[$nom])) {
    //il n'y a pas de utilisateur connecte
    require_once("header.html");   
    //Chercher les meilleurs recettes
} else {
    //l'utilisateur est connecte
    require_once("headerConnecte.html");
}
//connexion a la BDD pour changer les infos
require_once("db/Db.php");
//afficher la page
require_once("Modification/View/Modification.phtml");

?>
