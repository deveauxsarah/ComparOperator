<?php
include "./config/bdd.php";
include './config/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./CSS/admin.css" media="screen"/> 
    <title>Administrateur</title>
</head>
<body >  

    <?php
        $classe = new Manager();
        $infoDest = $classe ->getDestinationNames();
        $listTO = $classe ->getAllTONames();

        if (isset($_GET['ID'])) {
            if ($_GET['ID']=='NoOffer') {
                echo "<script>alert(\"tous les champs ne sont pas remplis pour ajouter une offre\")</script>";
            }elseif ($_GET['ID']=='NoOffer') {   
            }
        }
    ?>
    <section>
        <div class="box-container">
            <div class="box ">
                <div class="AddTO">
                    <div class="info">
                        <h2 class="text-white text-center">Ajouter un TO</h2><br><br>
                        <form action="./process/addTO.php" method="post">
                            <label class="text-xl text-white">Nom du tour-opérateur</label>
                            <input type="text" name="TOName" id="TOName" class="rounded"><br>
                            <label class="text-xl text-white">Lien du site du tour-opérateur</label>
                            <input type="text" name="TOLink" id="TOLink" class="rounded"><br>
                            <label class="text-xl text-white">le tour-opérateur est-il premium?</label>
                            <input type="checkbox" name="TOPremium" id="TOPremium" class="rounded"><br>
                            <div class="btn">
                                <button id="btn" type="submit" class="text-xl text">valider</button>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="box-container">
            <div class="box">
                <div class="info">
                    <div class="AddOffer">
                        <h2 class="text-white text-center">Ajouter d'une destination</h2><br><br>
                        <form action="./process/addOffer.php" method="post">
                            <label class="text-xl text-white">créer une destination</label>
                            <input type="text" name="DestName" id="DestName" class="rounded">
                                <label class="text-xl text-white"> ou selectionner une destination </label>
                                <select name="selectDest" id="destinationAddOfferDEST" class="destination rounded">
                                    <?php foreach ($infoDest as $key => $value) { ?> 
                                        <option value="<?=$value?>" ><?=$value?> </option> <?php
                                    } ?> 
                                </select><br>
                                <label class="text-xl text-white" >selectionner le tour-opérateur</label>
                                <select name="TOname" id="TOAddOfferTO" class="TO rounded">
                                    <?php foreach ($listTO as $key => $value) { ?> 
                                        <option value="<?=$value?>" ><?=$value?> </option> <?php
                                    } ?> 
                                </select><br>
                                <label class="text-xl text-white">Prix</label>
                                <input type="text" name="destPrice" id="destPrice" placeholder="prix en euro €" class="rounded"><br>
                            <div class="btn">
                                <button id="btn" type="submit" class="text-xl text">valider</button>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <section>
        <div class="box-container">
            <div class="box">

                    <div class="info">
                        <div class="SetPremium">
                            <h2 class="text-white text-center">Gestion des premiums</h2><br><br>
                            <form action="./process/updatePremium.php" method="post">
                                <label class="text-xl text-white">selectionner le tour-opérateur</label>
                                <select name="TOname" id="TOPremium" class="TO rounded">
                                    <?php foreach ($listTO as $key => $value) { ?> 
                                        <option href=<?=$value?> ><?=$value?> </option> <?php
                                    } ?> 
                                </select><br>
                                <label class="text-xl text-white">le tour-opérateur est-il premium?</label>
                                <input type="checkbox" name="TOPremium" id="TOPremium" class="rounded"><br>
                                <div class="btn">
                                    <button id="btn" type="submit" class="text-xl text">valider</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-white">
        <a id="returnHome"class="text-blue-900 text-3xl"href="./index.php"> Retour page accueil</a>    
        <img id="logo1"src="./images/logo3.png" >
    </footer>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</body>
</html>