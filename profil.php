<?php
require_once("header.php");
require_once("class.php");

$sql='SELECT * FROM carnet WHERE ID='.$_GET["id"];//--->variable contenant la requete sql
$personne= $pdo->query($sql);


$personne=$personne->fetch(PDO::FETCH_ASSOC) 
 ?>
<div class="container">
    <div class="row txt-center">
        <h1 class="text-center bg-secondary">
            <?php
    
    
    ?>
        </h1>
    </div>
    <div class="row">

        <div class="col-4 offset-3 card">
            <button class="card-title btn btn-success">
                <?php
echo $personne["NOM"]." ".$personne["PRENOM"]; ?>

            </button>
            <p class="card-text">

                <?php
echo $personne["NAISSANCE"]; ?>
            </p>


        </div>

    </div>


</div>





<?php

require_once("footer.php");
?>