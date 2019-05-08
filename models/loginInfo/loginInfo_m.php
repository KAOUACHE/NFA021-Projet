<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class LoginInfo_m extends CI_Model {

    protected $table = 'utilisateur';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();    
    }
    
   
     public function miseajour_motdepasse_utilisateur($login, $motdepasse ) {
         
        $this->db->set('uti_motdepasse', $motdepasse);
         
        
        // La condition
        $this->db->where('uti_login',$login);
        
        // retourne d'un booleen.
        return $this->db->update($this->table);
    }
     
}

?>