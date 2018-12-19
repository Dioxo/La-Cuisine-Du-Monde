<?php
class Requette{
    
    private $db;
    private $Recette;
    private $Type;
    private $Contient;
    private $NombreRecette;
    
    public function __construct() {
        require_once 'db/Db.php';
        $this->db = Db::connecter();
        $this->Recette = array();
    }
    
    
    //Chercher recette par index
    public function getRecette($numRecette){
        require_once('db/Db.php');
        //echo 'hi' . $this->Recette;
        $sql = "SELECT Titre, Description, Temps, NbPersonne, Auteur FROM recette WHERE numRecette = " .$numRecette;
        $result = $this->db->query($sql) ;
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {
                $this->Recette[] = $row;
                //echo "Titre: " . $row["Titre"]. " - Description: " . $row["Descritpion"]. " - Temps: " . $row["Temps"]. " - NbPersonne: " . $row["NbPersonne"] . " - Origine" . $row["Origine"] . " - Arome" . $row ["Arome"] . " - Fete" . $raw["Fete"] . " - Auteur" . $raw["Auteur"] . "<br>";
                
                /*foreach ($this->Recette as $recette) {
                    echo $recette["Titre"];
                }*/
            }
        }else{
            echo 'il ny a pas de resultats';
        }
        
        
        //non fermer la connection ici, pcq dans l'objet Recette, on doit trouver la recette et aussi les ingredients, laisse fermer la requete Ingredients la connection a la BD
        //$this->db->close();
        return $this->Recette;
    }
    
    public function getType($numRecette){
        require_once('db/Db.php');        
        $sql = "SELECT nomType from est_du_type as e, type as t WHERE e.numRecette=".$numRecette." AND e.numType=t.numType";
        $result = $this->db->query($sql) ;
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {
                $this->Type[] = $row;
                 }
        }else{
            //echo 'Error 404 Pas de resultats trouvés';
        }
                
        
        $this->db->close();
        return $this->Type;
        
    }
    
    public function getContient($numRecette){
        require_once('db/Db.php');        
        $sql = "SELECT nomIngredient, Quantite from contient as c, ingredient as i WHERE c.numRecette=".$numRecette." AND c.numIngredient=i.numIngredient";
        $result = $this->db->query($sql) ;
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {
                $this->Contient[] = $row;
                 }
        }else{
            //echo 'Erreur pas de resultats pour le numRecette = ' . $numRecette ;
        }
        
        
        //$this->db->close();
        return $this->Contient;
    }        
    
    public function creerUtilisateur($utilisateur){
        //echo 'chercher personnes';
        require_once('db/Db.php');
        //echo $utilisateur;
        
        
        
        
        $sql = "INSERT INTO utilisateur (Pseudo, Mdp, Genre, Email) VALUES ('".$utilisateur->getPseudo()."','".$utilisateur->getMdp()."','".$utilisateur->getGenre()."','".$utilisateur->getEmail()."')";

        //$sql = "INSERT INTO utilisateur(Pseudo, Mdp, Genre, Email) VALUES ('z','m','m','z')";

        
        if ($this->db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }
        
    }
    

    //AJOUTER une recette
    public function ajouterRecette($Recette)
    {
        require_once('db/Db.php');        
        $sql="INSERT INTO recette (Titre,Description,Temps,NbPersonne,Auteur) VALUES 
            ('".$Recette->getTitre()."','".$Recette->getDescription()."','".$Recette->getTemps()."',".$Recette->getNb_De_Personne().",".$Recette->getAuteur().")";
        

        if ($this->db->query($sql)) {
            echo  "<script type='text/javascript'>
                alert('Nouvelle Recette Ajoutée');
                </script>";
        } else {
            echo  "<script type='text/javascript'>
                alert('Erreur, pas possible de creer la recette, essayez autre fois');
                </script>";        }

    }
    
    public function confirmerUtilisateur($username, $password){
       
        $boolean = false;
        require_once('db/Db.php');        
        
        //SELECT Mdp, Email from utilisateur where Mdp = 'zozor' AND Email = 'zozor@g.com'

        
        $sql = "SELECT Mdp, Email from utilisateur where Mdp ='".$password ."' AND Email ='" .$username."'";
        $result = $this->db->query($sql) ;
        if($result->num_rows>0){
            $boolean = true;
        }
        $this->db->close();
        return $boolean;
        
    }
    
    public function getUserID(){
        $nom = 'NomUser';
        if(isset($_COOKIE[$nom])) {
            
            require_once('db/Db.php');        
            $sql = "SELECT numUser from utilisateur where Email ='".$_COOKIE[$nom]."'";
            $result = $this->db->query($sql) ;
            if($result){
            while($row = $result->fetch_assoc()) {
                $id[] = $row;
                 }
            }else{
            echo 'Erreur pas de resultat '. $this->db->error;
            }


            //$this->db->close();
            return $id;   
        }
    }
    
    public function getAuteurByID($id){
        
        require_once('db/Db.php');        
            $sql = "SELECT Pseudo from utilisateur where numUser ='".$id."'";
            $result = $this->db->query($sql) ;
            if($result){
            while($row = $result->fetch_assoc()) {
                $auteur[] = $row;
                 }
            }else{
            echo 'Erreur pas de resultat '. $this->db->error;
            }


            //$this->db->close();
            return $auteur;   
    }
    
   public function ajouterCommentaire($commentaire, $numRecette, $numUser){
        require_once('db/Db.php');        
        $sql = "INSERT INTO commentaire(Contenu,numUser,numRecette) VALUES('".$commentaire."',".$numUser.",".$numRecette.")";
       if ($this->db->query($sql)) {
            echo  "<script type='text/javascript'>
                alert('Nouveau commentaire Ajouté');
                document.location.replace('recette.php?numRecette=".$numRecette."&action=afficherCommentaires');
                </script>";
        } else {
            echo  "<script type='text/javascript'>
                alert('Erreur, pas possible de creer le commentaire, essayez autre fois');
                </script>";        }

    }
    
    public function afficherCommentaires($numRecette){
        require_once('db/Db.php');        
        $Commentaires = array();
        $sql = "SELECT Contenu,Email FROM commentaire NATURAL JOIN utilisateur  WHERE numRecette =".$numRecette;
        $result = $this->db->query($sql) ;
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {
                $Commentaires[] = $row;
                 }
        }else{
            //echo 'Error 404 Pas de resultats trouvés';
        }
                
        
        $this->db->close();
        return $Commentaires;
        
    }
    
    public function afficherRecetteUser()
    {
        require_once('db/Db.php');
        $userId = $this->getUserID();
        //print_r($userId);
        //$userId[0]['numUser'];
      // print_r($userId[0]['numUser']);
      
       $sql = 'SELECT * FROM recette where Auteur ='.$userId[0]['numUser'];
          $result = $this->db->query($sql) ;
       if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {
                $this->Recette[] = $row;
                //echo "Titre: " . $row["Titre"]. " - Description: " . $row["Descritpion"]. " - Temps: " . $row["Temps"]. " - NbPersonne: " . $row["NbPersonne"] . " - Origine" . $row["Origine"] . " - Arome" . $row ["Arome"] . " - Fete" . $raw["Fete"] . " - Auteur" . $raw["Auteur"] . "<br>";
                
                /*foreach ($this->Recette as $recette) {
                    echo $recette["Titre"];
                }*/
            }
        }else{
            //echo 'Vous n\'avez aucune recette';
        }
        
        
        //non fermer la connection ici, pcq dans l'objet Recette, on doit trouver la recette et aussi les ingredients, laisse fermer la requete Ingredients la connection a la BD
        //$this->db->close();
        return $this->Recette;
    }
    
    public function getMailAuteurByID(){
        
        require_once('db/Db.php');        
            $sql = "SELECT Email from utilisateur where Pseudo ='".$_GET['auteur']."'";
            $result = $this->db->query($sql) ;
            if($result){
            while($row = $result->fetch_assoc()) {
                $auteur[] = $row;
                 }
            }else{
            echo 'Erreur pas de resultat '. $this->db->error;
            }


            //$this->db->close();
            return $auteur;   
    }
    

     public function getUserIDByMail(){
       require_once('db/Db.php');
         $sql = "SELECT numUser from utilisateur where Pseudo ='".$_GET['auteur']."'";
         $resultat = $this->db->query($sql);
        if($resultat){
            while($row = $resultat->fetch_assoc()) {
                $id = $row;
                 }
            
           
        }
          return $id['numUser'];   
     }
    

    public function comparerMDP($mdp){
        require_once('db/Db.php');
        $nom = 'NomUser';
            $sql = "SELECT Mdp from utilisateur where Email ='".$_COOKIE[$nom]."'";
            $result = $this->db->query($sql) ;
            if($result){
            while($row = $result->fetch_assoc()) {
                $mdpBDD[] = $row;
                 }
            }else{
            echo 'Erreur pas de resultat '. $this->db->error;
            }

            //$this->db->close();
   
        
            if(strcmp($mdp,$mdpBDD[0]['Mdp']) == 0){
                return true;
            }else{
                return false;
            } 
    }
    
    public function changerInfoUSer($newMdp,$nouveauEmail){

        $sql = "UPDATE `utilisateur` SET `Mdp`='".$newMdp."' ,`Email`='".$nouveauEmail."' WHERE Email = '".$_COOKIE['NomUser']."'";
        
        if ($this->db->query($sql) === TRUE) {
            //echo "Record updated successfully";                    
            $nom = 'NomUser';
            unset($_COOKIE[$nom]);
            setcookie($nom, '', time() - 3600, '/'); // empty value and old timestamp
            
            $value = $nouveauEmail;
                setcookie("NomUser", $value, 0, "/");
                echo "<script type='text/javascript'>
                alert('Changement des Informations effectifs');
                document.location.replace('Index.php?action=showRecettes');
                </script>"; 
        } else {
            //cecho "Error updating record: " . $conn->error;
        }
    }
    
    public function getRecherche($mot){
        $recettes = array() ;
        $sql ="SELECT recette.Titre,recette.Description, x.Email, x.Pseudo FROM `recette` NATURAL JOIN (SELECT utilisateur.Email, utilisateur.numUser as Auteur, utilisateur.Pseudo FROM utilisateur)x WHERE `Titre` LIKE  '".$mot."%'UNION SELECT recette.Titre,recette.Description, utilisateur.Email, utilisateur.Pseudo FROM `recette` NATURAL JOIN utilisateur  WHERE `Pseudo` LIKE '".$mot."%'";
            $result = $this->db->query($sql);
            if($result){
            while($row = $result->fetch_assoc()) {
                $recettes[] = $row;
                 }
                
            }else{
            echo 'Erreur pas de resultat '. $this->db->error;
            }

            //$this->db->close();

        return $recettes;
    
    }
 
    
    public function getNombreReceteByID()   
    {
        require_once('db/Db.php');
       $idAuteur = $this->getUserIDByMail();
       
        $sql = "SELECT COUNT('numRecette') FROM recette where Auteur = '".$idAuteur."'";
        
        $result = $this->db->query($sql) ;
            if($result){
            while($row = $result->fetch_assoc()) {
                $NombreRecette = $row;
                 }
            }else{
            echo 'Erreur pas de resultat '. $this->db->error;
            }


            //$this->db->close();
        
            return $NombreRecette['COUNT(\'numRecette\')'];   
        
        
    }
    public function afficherRecetteAutreUser()
    {
        require_once('db/Db.php');
        //print_r($userId);
        //$userId[0]['numUser'];
      // print_r($userId[0]['numUser']);
      
       $sql = 'SELECT * FROM `recette` NATURAL JOIN (SELECT utilisateur.Pseudo, utilisateur.numUser as Auteur FROM utilisateur)x where x.Pseudo= "'.$_GET['auteur'].'"';
          $result = $this->db->query($sql) ;
       if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {
                $this->Recette[] = $row;
                //echo "Titre: " . $row["Titre"]. " - Description: " . $row["Descritpion"]. " - Temps: " . $row["Temps"]. " - NbPersonne: " . $row["NbPersonne"] . " - Origine" . $row["Origine"] . " - Arome" . $row ["Arome"] . " - Fete" . $raw["Fete"] . " - Auteur" . $raw["Auteur"] . "<br>";
                
                /*foreach ($this->Recette as $recette) {
                    echo $recette["Titre"];
                }*/
            }
        }else{
            //echo 'Vous n\'avez aucune recette';
        }
        
        
        //non fermer la connection ici, pcq dans l'objet Recette, on doit trouver la recette et aussi les ingredients, laisse fermer la requete Ingredients la connection a la BD
        //$this->db->close();
        return $this->Recette;
    }
     public function getOtherUserID(){
        if(isset($_COOKIE[$nom])) {
            
            require_once('db/Db.php');        
            $sql = "SELECT numUser from utilisateur where Email ='".$_GET['auteur']."'";
            $result = $this->db->query($sql) ;
            if($result){
            while($row = $result->fetch_assoc()) {
                $id[] = $row;
                 }
            }else{
            echo 'Erreur pas de resultat '. $this->db->error;
            }


            //$this->db->close();
            return $id;   
        }
    }
}


?>