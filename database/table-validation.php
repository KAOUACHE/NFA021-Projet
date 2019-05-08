<?php

// Configuration de la base de données
define("BD_HOST", "localhost");
define("BD_BASE", "BD_ecole");
define("BD_USER", "root"); 
define("BD_PASSWORD", "");


// Création de la table `utilisateur` en utilisant la méthode query.
$BD = new PDO("mysql:host=".BD_HOST.";dbname=".BD_BASE.";charset=UTF8", BD_USER, BD_PASSWORD);

$SQL = "CREATE TABLE `validation` (
    `val_id`      int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `val_email`   varchar(20)     NOT NULL,
    `val_lien`    int(4)            NOT NULL,
    `val_statut`  varchar(20)     NOT NULL,
    `val_date`    DATETIME        NOT NULL,
    
   
    PRIMARY KEY (`val_id`)
)
ENGINE=INNODB DEFAULT CHARSET=utf8;";

if($BD->query($SQL)){
    echo "<p>Création de la table `validation` réussie.</p>";
}else{
    echo "<p>Problème lors de la création de la table `validation`.</p>";
    exit();
}

?>