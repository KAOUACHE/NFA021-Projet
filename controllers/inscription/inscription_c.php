<?php


class Inscription_c extends CI_Controller {
    
    //private static $inscriptionTemp = false;
    
    
    public function inscription(){
        
        if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['datenaissance']) || empty($_POST['email']) || empty($_POST['role']) || empty($_POST['login']) ){
            
            echo "<p> Vous devez spécifier tous les champs !</p>";
            $this->load->view('inscription/inscription-form_v'); 
            
        }else{
            
            $this->load->model('inscription/inscription_utilisateur_temp_m');
            $inscriptionTemp = $this->inscription_utilisateur_temp_m->inscrire_utilisateur($_POST['nom'],$_POST['prenom'], $_POST['datenaissance'], $_POST['email'], $_POST['role'], $_POST['login']);
            
            
            if($inscriptionTemp){
                $this->load->view('inscription/inscription-temp_v');
                
                $this->load->model('inscription/inscription_validation_m');
                $lien = rand(1000, 2000); 
                $validation = $this->inscription_validation_m->ajouter_validation($_POST['email'], $lien, 'non-valide');
                
                //$emaillien_tableau['emailcode'] = [$_POST['email'], $lien, ];
                $lien_tableau['login'] = $_POST['login'] ;
                $lien_tableau['code'] = $lien ;
                $this->load->view('inscription/inscription-confirmation-email_v', $lien_tableau);
                   
            }
        }
    }
            
    
         //Envoide mail de confirmation
         /*
         $to = "kaouache2000@yahoo.fr";
         $subject = "Projet NFA021 - mail de confirmation ";
         
         //$message = "<html><head></head><body>C:/wamp64/www/e-Ecole/application/controllers/inscription/inscription_c.php</html>";
                
         $message = "<html><head></head><body>index.php/inscription/inscription_c/recuperer_lien/$lien</body></html>";
                
         $headers  = 'MIME-Version: 1.0' . "\r\n";
         $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                
         mail($to, $subject, $message, $headers);
          */
        
       
    
    
    public function inscription_validation($code, $login){
        
        //echo $code;
     
        $this->load->model('inscription/inscription_validation_m');
    
        $liens = array();     
        $liens = $this->inscription_validation_m->chercher_liens();  // $liens est un tableau des objets.
        

        $i = 0 ;
        while($i < sizeof($liens) && $code != $liens[$i]-> val_lien){
            $i ++;    
        }
    
        
        if($i >= sizeof($liens)){
            
            $this->load->view('inscription/inscription_non-validation_v'); 
        
        }else{
       
            $this->load->model('inscription/inscription_validation_m');
            $miseajour = $this->inscription_validation_m->miseajour_validation($code);
            
            
            if($miseajour){
                $this->load->model('loginInfo/loginInfo_m');
                
                $motdepasse = strval(rand(1000,2000));
                $motdepasse_tableau = array('uti_motdepasse' => $motdepasse);
                
                
                $ajouterMotdepasse = $this->loginInfo_m->miseajour_motdepasse_utilisateur($login, $motdepasse);
                
                if($ajouterMotdepasse){
                     $this->load->view('inscription/inscription-validation_v', $motdepasse_tableau);
                }else{
                    $this->load->view('inscription/inscription-rajout_motdepasse_v');
                }
                
               
            }
                       
        }
           
    }
              
}
    
?>