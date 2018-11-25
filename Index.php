<?php

//constante pour savoir le nom de cookies
$nom = 'NomUser';
if(!isset($_COOKIE[$nom])) {
    //il n'y a pas de utilisateur connecte
    require_once("header.html");    
} else {
    //l'utilisateur est connecte
    require_once("headerConnete.html");
}
      


//connection a la BD
require_once("db/Db.php");

//Chercher les meilleurs recettes
require_once("Accueil/controllers/Accueil_Controller.php");
?>
