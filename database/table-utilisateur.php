<?php

// Configuration de la base de données
define("BD_HOST", "localhost");
define("BD_BASE", "BD_ecole");
define("BD_USER", "root"); 
define("BD_PASSWORD", "");


// Création de la table `utilisateur` en utilisant la méthode query.
$BD = new PDO("mysql:host=".BD_HOST.";dbname=".BD_BASE.";charset=UTF8", BD_USER, BD_PASSWORD);

$SQL = "CREATE TABLE `utilisateur` (
    `uti_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `uti_nom` varchar(20) NOT NULL,
    `uti_prenom` varchar(20) NOT NULL,
    `uti_login` varchar(20) NOT NULL,
    `uti_motdepasse` varchar(20) NOT NULL,
    `uti_datenaissance` varchar(20) NOT NULL,
    `uti_email` varchar(20) NOT NULL,
    `uti_role` varchar(10) NOT NULL,
    
    
    PRIMARY KEY (`uti_id`)
)
ENGINE=INNODB DEFAULT CHARSET=utf8;";

if($BD->query($SQL)){
    echo "<p>Création de la table `utilisateur` réussie.</p>";
}else{
    echo "<p>Problème lors de la création de la table `utilisateur`.</p>";
    exit();
}

?>