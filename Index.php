<?php
//Charger le header (parte azul que está arriba)
//echo 'charge header';
require_once("header.html");
//connection a la BD
require_once("db/Db.php");

//Chercher les meilleurs recettes
require_once("Accueil/controllers/Accueil_Controller.php");
?>
