<?php


class Utilisateur_c extends CI_Controller {
    
    
    public function insertion(){
        
        if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login']) || empty($_POST['motdepasse']) || empty($_POST['datenaissance']) || empty($_POST['email']) || empty($_POST['role'])){
            
            echo "<p> Vous devez spécifier tous les champs !</p>";
            $this->load->view('utilisateur/utilisateur-insertion-form_v'); 
            
        }else{
        
            $this->load->model('utilisateur_m');
            $resultat = $this->utilisateur_m->ajouter_utilisateur($_POST['nom'],$_POST['prenom'],$_POST['login'],$_POST['motdepasse'], $_POST['datenaissance'], $_POST['email'], $_POST['role']);
            
            if($resultat){
                $this->load->view('utilisateur/utilisateur-insertion-resultat_v');
            }
        }
    }
    
    
    
    public function selection(){
        
            $this->load->model('utilisateur_m');
        
            $selection = array();
            $selection['user_info'] = $this->utilisateur_m->selectionner_utilisateurs();
            
            
            $this->load->view('utilisateur/utilisateur-selection-resultat_v', $selection);        
    }

    
   
    public function mise_a_jour(){
        if(empty($_POST['nom']) && empty($_POST['prenom'])){
            
            echo "<p> Vous devez spécifier le nom et le prénom de l'utilisateur à mettre à jour</p>";
            $this->load->view('utilisateur/utilisateur-miseajour-form_v');
            
        }else{
            if(empty($_POST['login']) && empty($_POST['motdepasse']) && empty($_POST['email'])){
                echo "<p> Vous devez spécifier au moin un champs !</p>";
                $this->load->view('utilisateur/utilisateur-miseajour-form_v');
                
             }else{
                $this->load->model('utilisateur_m');
                
                $identite = array('uti_nom' => $_POST['nom'], 'uti_prenom' => $_POST['prenom']);
                //$identite = $_POST['nom'];
                $miseajour = $this->utilisateur_m->miseajour_utilisateur($identite, $_POST['login'], $_POST['motdepasse'],$_POST['email']);
                
                if($miseajour){
                    $this->load->view('utilisateur/utilisateur-miseajour-resultat_v');
                }
            }   
        }  
    }
    
   

    public function suppression(){
        
        if(empty($_POST['nom']) || empty($_POST['prenom'])){
            
            echo "<p> Vous devez spécifier le nom et le prénom de l'utilisateur à supprimer</p>";
            $this->load->view('utilisateur/utilisateur-suppression-form_v');
            
        }else{
            $this->load->model('utilisateur_m');
            
            
            $identite = array('uti_nom' => $_POST['nom'], 'uti_prenom' => $_POST['prenom']);
            

            $suppression = $this->utilisateur_m->supprimer_utilisateur($identite);
            
            //echo $suppression;
            
            if($suppression){
                $this->load->view('utilisateur/utilisateur-suppression-resultat_v');
            }
            
        }
        
    }
    
}
    
?>