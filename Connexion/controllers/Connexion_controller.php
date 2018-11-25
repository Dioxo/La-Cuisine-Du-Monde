<?php

    class Connexion_controller{
        
        public function showConnection(){
            require_once('./Connexion/View/Connexion.phtml');
        }
        
        public function entrer(){
        require_once('./Connexion/models/Connexion_model.php');
            $username = $_POST['pseudo'];
            $password = $_POST['pass'];
            $model = new Connexion_Model();
            $entrer = $model->confirmation($username, $password);
            
            echo $entrer;
            
            if($entrer){
                //L'information que l'utilisateur a entré c'est correcte
                //on va a la page d'accueil mais on change la toolbar
                
                //bool setcookie ( string $name [, string $value [, int $expire = 0 [, string $path [, string $domain [, bool $secure = false [, bool $httponly = false ]]]]]] )
                $value = $username;
                setcookie("NomUser", $value, 0, "/");
                echo "<script type='text/javascript'>
                alert('Bienvenue');
                document.location.replace('Index.php');
                </script>";               
                
            } else{   
                echo "<script type='text/javascript'>
                alert('Le mot de passe ou le Login est incorrect');
                document.location.replace('connexion.php?action=showConnection');
                
                
                </script>";

                
            
            }
            
            
            
            
        }
        
        
    }
    
    
    
    
?>