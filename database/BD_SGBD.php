   
<?php

//***********************************************************************************************************************************************
//* Ce script permet de configurer la base de données, de se connecter au SGBD, de créer la base de données et de se connecter à cette base.
//***********************************************************************************************************************************************

        
// Configuration de la base de données
define("BD_HOST", "localhost");
define("BD_BASE", "BD_ecole");
define("BD_USER", "root"); 
define("BD_PASSWORD", "");
      
//Connexion au SGBD
try{
    $BD = new PDO("mysql:host=".BD_HOST.";charset=UTF8", BD_USER, BD_PASSWORD);
    echo "<p>Connexion au SGBD réussie.</p>";
} catch(Exception $e) {
    echo "<p>Problème de connexion au SGBD.</p>";
    exit();
}

//Création de la base de données
if($BD->query("DROP DATABASE IF EXISTS `".BD_BASE."`;") && $BD->query("CREATE DATABASE IF NOT EXISTS `".BD_BASE."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci")){
    echo "<p>Création de la base de données ".BD_BASE." réussie.</p>";
}else{ 
    echo "<p>Problème lors de la création de la base de données ".BD_BASE.".</p>";
    exit();
}

//Connexion à la base de données
try{
    $BD = new PDO("mysql:host=".BD_HOST.";dbname=".BD_BASE.";charset=UTF8", BD_USER, BD_PASSWORD);
    echo "<p>Connexion à la base de données ".BD_BASE." réussie.</p>";
} catch(Exception $e) {
    echo "<p>Problème de connexion à la base de données.</p>";
    exit();
}
       
?>
       

        
        
