<?php
class Requette{
    
    private $db;
    private $Recette;
    private $Type;
    private $Contient;
    
    public function __construct() {
        require_once 'db/Db.php';
        $this->db = Db::connecter();
        $this->Recette = array();
    }
    
    
    //Chercher recette par index
    public function getRecette($numRecette){
        require_once('db/Db.php');
        //echo 'hi' . $this->Recette;
        $sql = "SELECT Titre, Description, Temps, NbPersonne, Origine, Arome, Fete, Auteur, Gout FROM recette WHERE numRecette = " .$numRecette;
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
            echo 'Error 404 Pas de resultats trouvés';
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
            echo 'Erreur pas de resultats pour le numRecette = ' . $numRecette ;
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
    
    
    
    
}


?>