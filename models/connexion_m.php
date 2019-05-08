<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Connexion_m extends CI_Model {

    protected $table = 'utilisateur';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();    
    }
    
   
    public function chercher_login_motdepasse(){
        
        $this->db->select('uti_login');
        $this->db->select('uti_motdepasse');
        
        $this->db->from($this->table);
        
        //$this->db->limit($nb, $debut);
        //$this->db->order_by('uti_id', 'desc');
        
        $get = $this->db->get();
        return $get->result();   
    }
    
}

?>