<?php

class Connexion_c extends CI_Controller {
     
    public function connecter() {
        if(empty($_POST['login']) || empty($_POST['motdepasse'])){
            echo "<p> Vous devez spécifier votre login et votre mot de passe !</p>";
            $this->load->view('connexion/connexion-form_v');   
        }else{
            $this->load->model('connexion_m');        
            $login_pw = array();
            $login_pw = $this->connexion_m->chercher_login_motdepasse(); // $login_pw est un tableau des objets.
        
            
            //echo sizeof($login_pw);
        
        
            $i = 0 ;
            
            while($i < sizeof($login_pw) && ($_POST['login'] != $login_pw[$i]-> uti_login || $_POST['motdepasse'] != $login_pw[$i]-> uti_motdepasse)){
                
                $i ++;    
            } 
            
        
            if($i >= sizeof($login_pw)){
                $this->load->view('connexion/connexion-form_v'); 
            }else{
                 $this->load->view('connexion/connexion-resultat_v');
                 
            }
                
          
       }
            
    }
                      
}

?>