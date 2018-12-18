<?php


require_once("db/Db.php");

//constante pour savoir le nom de cookies
$nom = 'NomUser';
if(!isset($_COOKIE[$nom])) {
    //il n'y a pas de utilisateur connecte
    require_once("header.html");   
    //Chercher les meilleurs recettes
} else {
    //l'utilisateur est connecte
    require_once("headerConnecte.html");
}
    require_once("Recherche/Controller/Recherche_Controller.php");
    $controller = new Recherche_Controller();
    $controller->showRecettes();

?>
