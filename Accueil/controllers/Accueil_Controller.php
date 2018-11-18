<?php
//Appeler le modele
require_once("Accueil/models/Accueil_Model.php");
$model = new Accueil_Model();
$Recette1 = $model->getRecette1();
$Recette2 = $model->getRecette2();
$Recette3 = $model->getRecette3();
$Recette4 = $model->getRecette4();
$Recette5 = $model->getRecette5();
$Recette6 = $model->getRecette6();

require_once("Accueil/views/Accueil_View.phtml");

?>