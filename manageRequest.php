<?php
require_once("class.php");

if ($_GET["isSend"]=="true") {
    $requestInput = $_GET["requestSyntax"];



    
$RSCarnet= $pdo->query($requestInput);
}
header("location : index.php");
?>