<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil_c extends CI_Controller {
    
    public function index() {
        $this->load->view('accueil/accueil_v');
    }
    
    /*
    public function portail_utilisateur(){
        $this->load->view('accueil/accueil-utilisateur_v');
    } */
}

?>