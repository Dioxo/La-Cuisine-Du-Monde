<?php
require_once("header.html");

require_once('Recette/controllers/Recette_Controller.php');
$controller = new Recette_Controller();
//echo $_GET['numRecette'];
if(isset($_GET['numRecette'])){
    $controller->afficherRecette($_GET['numRecette']);
    //$Recette = $Requette->getRecette($numRecette);
    
}else{
    echo 'La page nexiste pas';
}
