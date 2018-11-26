    <?php
class Recette{
    
    private $titre = '';
    

    private $ingredients = array();
    //private $image = 'image ';
    private $description = '';
    private $temps = '';
    private $nb_De_Personne = 0;
    private $note = '';
    private $origine = '';
    private $arome = '';
    private $fete = '';
    private $auteur = 0;
    private $type = '';
    private $gout = '';
    
    public function __construct(){
        
    }
    
    public function creerRecette($numRecette){
        
        //Chercher la recette dans la BDD
        require_once 'Helper/Requette.php';
        $Requette = new Requette();
        
        $Recette = $Requette->getRecette($numRecette);
        
        
        //Assignation des resultats au Objet Recette
        $this->titre = $Recette[0]["Titre"];
        $this->description = $Recette[0]["Description"];
        $this->temps = $Recette[0]["Temps"];
        $this->nb_De_Personne = $Recette[0]["NbPersonne"];
        $this->origine = $Recette[0]["Origine"];
        $this->arome = $Recette[0]["Arome"];
        $this->fete = $Recette[0]["Fete"];
        $this->auteur = $Recette[0]["Auteur"];
        $this->gout = $Recette[0]["Gout"];
        
        
        /*
        * Pour INGREDIENTS, c'est un cas particulier
        *On doit chercher dans la table Ingredients, tous les elements et le mettre dans un array 
         //$this->ingredients = ??????;
         * 
         * Pour Note, on doit chercher dans la table Note, c'est un autre requette
        //$this->note = $Recette["Titre"];     
         * 
         *
         * Pour Type, le même cas
         * $this->type = $Recette["Titre"];

         * 
         *          */
    }
    
    public function getTitre() {
        return $this->titre;
    }

    public function getIngredients() {
        return $this->ingredients;
    }

    function getDescription() {
        return $this->description;
    }

    function getTemps() {
        return $this->temps;
    }

    function getNb_De_Personne() {
        return $this->nb_De_Personne;
    }

    function getNote() {
        return $this->note;
    }

    function getOrigine() {
        return $this->origine;
    }

    function getArome() {
        return $this->arome;
    }

    function getFete() {
        return $this->fete;
    }

    function getAuteur() {
        return $this->auteur;
    }

    function getType() {
        return $this->type;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setIngredients($ingredients) {
        $this->ingredients = $ingredients;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setTemps($temps) {
        $this->temps = $temps;
    }

    function setNb_De_Personne($nb_De_Personne) {
        $this->nb_De_Personne = $nb_De_Personne;
    }

    function setNote($note) {
        $this->note = $note;
    }

    function setOrigine($origine) {
        $this->origine = $origine;
    }

    function setArome($arome) {
        $this->arome = $arome;
    }

    function setFete($fete) {
        $this->fete = $fete;
    }

    function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    function setType($type) {
        $this->type = $type;
    }

    public function __toString() {
        return 'Titre ' . $this->titre. "<br/> " . 
                'Description' . $this->description. "<br/> " .
                'Temps' . $this->temps."<br/> " .
                'nb Personnes' . $this->nb_De_Personne."<br/> " .
                'Origine' . $this->origine.
                'goute' . $this->gout
            ;
            
    }

}

?>