<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Inscription_validation_m extends CI_Model {

    protected $table = 'validation';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();    
    }
    
   
    public function ajouter_validation($email, $lien, $statut) {
        
        $this->db->set('val_email', $email);
        $this->db->set('val_lien', $lien);
        $this->db->set('val_statut', $statut);
        
        $this->db->set('val_date', 'NOW()',false);
        

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout

        return $this->db->insert($this->table);
    }
    
    
    public function chercher_liens(){
        
        $this->db->select('val_lien');
        
        
        $this->db->from($this->table);
        
        //$this->db->limit($nb, $debut);
        //$this->db->order_by('uti_id', 'desc');
        
        $get = $this->db->get();
        return $get->result(); 
    } 
    
    
     public function miseajour_validation($code) {
         
        $this->db->set('val_statut', 'valide');
         
        
        // La condition
        $this->db->where('val_lien',$code );
        
        // retourne d'un booleen.
        return $this->db->update($this->table);
    }
    
 
}

?>