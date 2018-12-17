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
require_once("Modification/Controller/Modification_Controller.php");
$controller = new Modification_Controller();

if(isset($_GET['action'])){
    $action = $_GET['action'];
    $controller->$action();
}else{
$controller->afficherForm();
    
}

?>
