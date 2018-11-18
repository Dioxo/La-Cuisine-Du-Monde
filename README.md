Arborescence


/
- Accueil/
	   -controllers/Accueil_controller.php
	   -models/Accueil_Model.php
	   -views/Accueil_View.php
- Helper/
	   -Requette.php
- Objets/
	   -Recette.php
- Recette/
	   -controllers/Recette_controller.php
	   -models/Recette_Model.php
	   -views/Recette_View.php
- db/
	-Db.php
- index.php
- recette.php


Description

Le repertoire de 'Accueil' et Recette contient les elements pour la page d'accueil de de recette, distribué pour travailler avec MVC
	-controllers
	-models
	-views


Le repertoire Objets, contient les objets necessaires pour travailler dans le projet, dans notre cas, on a pour le moment Recette, qui utilise la class 'Requette.php', decrite à continuation...


Le repertoire Helper, contient le fichier 'Requette.php' qui fait tous les requettes necessaires à la BDD pour les attribuées à notre objet Recette

Le repertoire db contient que le fichier pour faire la connection a la BDD

Le fichier index.php (recette.php) contient les elements necessaires pour creer la page d'accueil (Recette), il fait la reference aux controllers, models et views du repertoir Accueil (Recette)


