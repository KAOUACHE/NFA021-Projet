<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Utilisateur_m extends CI_Model {

    protected $table = 'utilisateur';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();    
    }
    
   
    public function ajouter_utilisateur($nom, $prenom, $login, $motdepasse, $datenaissance, $email, $role) {
        
        $this->db->set('uti_nom', $nom);
        $this->db->set('uti_prenom', $prenom);
        $this->db->set('uti_login', $login);
        $this->db->set('uti_motdepasse', $motdepasse);
        $this->db->set('uti_datenaissance', $datenaissance);
        $this->db->set('uti_email', $email);
        $this->db->set('uti_role', $role);
        

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout

        return $this->db->insert($this->table);
    }
    
    
    
    public function selectionner_utilisateurs(){
        
        $this->db->select('*');
        $this->db->from($this->table);
        
        //$this->db->limit($nb, $debut);
        //$this->db->order_by('uti_id', 'desc');
        
        $get = $this->db->get();
        return $get->result();  //retourne un tableau des objets. 
    }
    
    
    
    public function miseajour_utilisateur($identite, $login, $motdepasse, $email) {
        
        if($login != null){
            $this->db->set('uti_login', $login);
        }
        
        if($motdepasse != null){
            $this->db->set('uti_motdepasse', $motdepasse);
        }
        
        if($email != null){
            $this->db->set('uti_email', $email);
        }
        
        
        // La condition
        $this->db->where($identite);
        
        // retourne d'un booleen.
        return $this->db->update($this->table);
    }
    
    
    
    public function supprimer_utilisateur($identite) {
        
        // La condition
        $this->db->where($identite);
        
        // retourne d'un booleen.
        return $this->db->delete($this->table);  
    }
}

?>