<?php
//Charger lentete du site
require_once("header.html");
require_once("./Connexion/controllers/Connexion_controller.php");
$controller = new Connexion_controller();
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();   
    }else{
        echo ' La page n\'existe pas';
    }
    
    
?>
