<?php
require_once("header.php");// header commun

require_once("class.php");//va chercher la connexion à la bdd depuis class.php


$sql="SELECT * FROM carnet";//--->variable contenant la requete sql
$RSCarnet= $pdo->query($sql);
/*
 le nom de la variable : RS+nom de la table (RS = Response)
*/

?>

<form id="contactForm" action="newContact.php" method="post" class="container hidden text-light">
    <div class="row">
        <div class="form-group col">
            <label for="nom">nom</label>
            <input name="nom" id="nom" type="text">
        </div>
        <div class="form-group col">
            <label for="prenom">prenom</label>
            <input name="prenom" id="prenom" type="text">
        </div>
        <div class="form-group col">
            <label for="naissance">naissance</label>
            <input name="naissance" id="naissance" type="text">
        </div>
        <div class="form-group col">
            <label for="ville">ville</label>
            <input name="ville" id="ville" type="text">
        </div>
    </div>
    <div class="row m-3">
        <button class="btn btn-success" type="submit">
            créer ce nouveau contact

        </button>

    </div>
</form>
<div id="newRequestForm" class="container m-5">
    <form action="manageRequest.php" method="get">
        <div class="row">
            <div class="col-3">
                <label for="requestSyntax">entrez la requete</label>
            </div>
            <div class="col-9">
                <input type="text" class="w-100" name="requestSyntax" id="requestSyntax">
            </div>
        </div>
        <button type="submit" class="mt-3 col-9 w-100 btn btn-success" name="isSend" value="true">envoyer la
            requete</button>
    </form>
</div>
<div id="newRequestForm" class="container m-5">
    <div class="row text-center">
        <p id="addContact" onclick="newContactAppear()">
            <i class="fas fa-plus-circle" style="font-size:34px"></i>
            ajouter un contact
            <i class="fas fa-plus-circle" style="font-size:34px"></i>
        </p>
    </div>

</div>

<div class="container bg-secondary">
    <div class="row mt-5 justify-content-between">

        <?php
            // construction de la gestion des erreurs de requètes
            if(!$RSCarnet){
                die("Echec de la requete : ".$RSCarnet->errorInfo());
            }
            foreach($RSCarnet as $rowRSCarnet){
        ?>


        <!---------------------------------

-----------------CARDS-----------------

------------------------------------>
        <div class="card move col-sm-3 col-md-2 m-2">
            <a class="card-title btn btn-success mt-3" href="
                    <?php
                    echo "profil.php?id=".$rowRSCarnet["ID"]
                     ?>
            ">
                <?php
                    echo $rowRSCarnet["PRENOM"]." ".$rowRSCarnet["NOM"];
                ?>
            </a>
            <div class="card-text">
                <p>est né le : <?php
                        echo $rowRSCarnet["NAISSANCE"];?></p>
                <p>

                    <?php

                        //-----calcul de l'age
                        $aujourdhui = date("Y-m-d");
                        $age = date_diff(date_create($rowRSCarnet["NAISSANCE"]), date_create($aujourdhui));
                        echo 'il / elle a  '.$age->format('%y'). ' ans';
                    ?>

                </p>

            </div>

            <form class="rounded btn bg-alert deleteContact">
                <a style="color:red" title="supprimer ce contact" class="text-alert"
                    href="deleteContact.php?id=<?php echo $rowRSCarnet["ID"]; ?>">
                    <i class="fas fa-minus-square text-alert" data-contactID=""></i>
                </a>

            </form>
        </div>

        <?php
}
?>
    </div>
</div>


<?php
require_once("footer.php");

?>