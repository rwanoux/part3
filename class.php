<?php

// définir les constantes de connexion à la base de donnée
define("SERVER","localhost");//adresse du server
define("BDD_NAME", "ADEN_bdd3");//nom de la bdd
define("USER", "root");//user
define("PASSWORD", "root");//mot de passe



try{
    //--connexion à la base donnée
    $pdo = new PDO("mysql:host=".SERVER.";dbname=".BDD_NAME.";charset=utf8", USER, PASSWORD);

}catch(PDOException $error){
    //---gestion des erreurs
    //-si erreur :
    print("___ERREUR___ : ".$error->getMessage());//----> afficher l'erreur
    die();//-----> stopper tout traitement
}



?>