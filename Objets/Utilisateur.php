<?php

class Utilisateur{
    private $pseudo = '';
    private $mdp     = '';
    private $genre = '';
    private $email = '';
    
    
    public function __construct($pseudo, $mdp, $genre, $email){
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->genre = $genre;
        $this->email = $email;
    }
    
    
    
    public function getPseudo(){
        return $this->pseudo;
    }
    
     public function getMdp(){
        return $this->mdp;
    }
    
     public function getGenre(){
        return $this->genre;
    }
    
     public function getEmail(){
        return $this->email;
    }
    
    
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
    
    public function setMdp($mdp){
        $this->mdp = $mdp;
    }
    
    public function setGenre($genre){
        $this->genre = $genre;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    
     public function __toString() {
        return 'pseudo ' . $this->pseudo. "<br/> " . 
                'mdp' . $this->mdp. "<br/> " .
                'genre' . $this->genre."<br/> " .
                'email' . $this->email."<br/> " 
            ;
            
    }
    
}