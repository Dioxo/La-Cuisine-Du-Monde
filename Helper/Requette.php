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
            echo 'no hay resultados';
        }
        
        $this->db->close();
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
            echo 'no hay resultados';
        }
                
        
        
    }
    
    public function getContient($numRecette){
        require_once('db/Db.php');        
        $sql = "SELECT nomIngredient from contient as c, ingredient as i WHERE c.numRecette=".$numRecette." AND c.numIngredient=i.numIngredient";
        $result = $this->db->query($sql) ;
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {
                $this->Contient[] = $row;
                 }
        }else{
            echo 'no hay resultados';
        }
    }
    
    //AJOUTER FLORIAN
    
}


?>