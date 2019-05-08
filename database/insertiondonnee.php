<?php

// Configuration de la base de données
define("BD_HOST", "localhost");
define("BD_BASE", "BD_ecole");
define("BD_USER", "root"); 
define("BD_PASSWORD", "");


// Insertion de données dans la table 'utilisateur : utilisation de la méthode exec. 
$BD = new PDO("mysql:host=".BD_HOST.";dbname=".BD_BASE.";charset=UTF8", BD_USER, BD_PASSWORD);

$SQL = "INSERT INTO `utilisateur` (`uti_id`, `uti_nom`, `uti_prenom`, `uti_login`, `uti_motdepasse`, `uti_datenaissance`, `uti_email`, `uti_role`) VALUES (NULL, 'nomadmin', 'prenomadmin', 'loginadmin', 'motdepasseadmin', '01/01/1980', 'admin@gmail.com', 'admin');";
    

if($nlignes = $BD->exec($SQL)){
    echo "<p>$nlignes ligne(s) ont été ajoutée(s).</p>";
    
}else{
    echo "<p>Erreur lors de l'ajout.</p>";
}

?>