<?php
require_once("class.php");
print_r($_POST);


$nom=strip_tags($_POST["nom"]);
$prenom=strip_tags($_POST["prenom"]);
$naissance=strip_tags($_POST["naissance"]);
$ville=strip_tags($_POST["ville"]);



echo $nom.$prenom.$naissance;

$sql="INSERT  INTO carnet(NOM,PRENOM,NAISSANCE,VILLE) VALUES('".$nom."','".$prenom."','".$naissance."','".$ville."')";//--->variable contenant la requete sql


var_dump($pdo->exec($sql));

header("location:index.php")
?>