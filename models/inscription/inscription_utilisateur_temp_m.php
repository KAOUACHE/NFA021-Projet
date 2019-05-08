<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Inscription_utilisateur_temp_m extends CI_Model {

    protected $table = 'utilisateur';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();    
    }
    
   
    public function inscrire_utilisateur($nom, $prenom, $datenaissance, $email, $role, $login) {
        
        $this->db->set('uti_nom', $nom);
        $this->db->set('uti_prenom', $prenom);
        $this->db->set('uti_datenaissance', $datenaissance);
        $this->db->set('uti_email', $email);
        $this->db->set('uti_role', $role);
        $this->db->set('uti_login', $login);
        
        

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout

        return $this->db->insert($this->table);
    }
    

}

?>