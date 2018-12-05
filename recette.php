<?php
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

require_once('Recette/controllers/Recette_Controller.php');
$controller = new Recette_Controller();
//echo $_GET['numRecette'];
if(isset($_GET['numRecette'])){
    $controller->afficherRecette($_GET['numRecette']);
    //$Recette = $Requette->getRecette($numRecette);
    
}else{
    echo 'La page nexiste pas';
}

require_once('Commentaire/View/Commentaire.phtml');