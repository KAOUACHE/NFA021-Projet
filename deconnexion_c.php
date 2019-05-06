<?php

    class Deconnexion_c extends CI_Controller {
        
        public function deconnecter(){
            if(session_name() != null){
                session_destroy();
            }
        }
     }

?>