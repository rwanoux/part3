<?php

require_once("class.php");



$targetContactID=$_GET["id"];

$requestComand='DELETE FROM carnet WHERE ID="'.$targetContactID.'"';
    
$RSCarnet= $pdo->exec($requestComand);

header("location:index.php");


?>