<?php

require_once 'Recette/models/Recette_Model';
$model = new Accueil_Model();
$datos = $model->getRecette();

require_once 'Recette/views/Recette_View';