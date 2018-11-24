<?php 
    require_once('header.html');
    require_once('Inscription/controllers/Inscription_controller.php');

    $controller = new Inscription_controller();
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();   
    }else{
        echo ' La page n\'existe pas';
    }
    


?>