
<html>

<?php

foreach($user_info as $utilisateur){
    echo $utilisateur->uti_id."    ".$utilisateur->uti_nom."    ".$utilisateur->uti_prenom."    ".$utilisateur->uti_login."    ".$utilisateur->uti_motdepasse."    ".$utilisateur->uti_datenaissance."    ".$utilisateur->uti_email."    ".$utilisateur->uti_role;
    
    //print_r($utilisateur);
    echo "</br>";
}

?>
    
<p> <a href="http://localhost/e-ecole/"> accueil</a>.</p>
   
    
</html>

