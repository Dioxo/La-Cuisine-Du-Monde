<?php
require_once("Accueil/controllers/Accueil_Controller.php");
$controller = new Accueil_Controller();

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

 if(isset($_GET['action'])){
    $action = $_GET['action'];
    $controller->$action();   
}else{
     /*Changement de 'La page n'existe pas' 
    par montrer la page d'accueil           */
     $controller->showRecettes();
}


?>
