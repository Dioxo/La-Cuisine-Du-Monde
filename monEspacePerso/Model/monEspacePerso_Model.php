<?php

class monEspacePerso_Model
{
	private $num;
    private $Pseudo;
    private $Recette;
    
    public function __construct()
    {
        require_once('Helper/Requette.php');
        $Requette = new Requette();
        $IdUser =  $Requette->getUserID();
        
		$this->num = $IdUser[0]['numUser'];
        
        $this->Pseudo =  $Requette->getAuteurByID($IdUser[0]['numUser']);
        
        $this->Recette = $Requette->afficherRecetteUser();
       // print_r($this->Recette);
        
    }
    
	public function getImage(){
		return ''.$this->num.'.jpg';
	}
	
    public function getInfoPerso()
    {
        return $this->Pseudo[0]['Pseudo'];
    }
    public function getRecette()
    {
        return $this->Recette;
    }
    

    
}
?>