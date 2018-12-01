<?php

//constante pour savoir le nom de cookies
$nom = 'NomUser';
if(!isset($_COOKIE[$nom])) {
    //il n'y a pas de utilisateur connecte
    require_once("header.html");  
    echo '<h1 style = "text-align-center;"><b>Vous devez vous connecter pour utiliser nos services</b></h1>';
    //Chercher les meilleurs recettes
} else {
    //l'utilisateur est connecte
    require_once("headerConnecte.html");
    require_once("./ajoutRecette/Controllers/AjoutRecette_Controller.php");
    $controller = new AjoutRecette_Controller();

     if(isset($_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();   
    }else{
        echo ' La page n\'existe pas';
    }
}





?>