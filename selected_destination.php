<?php


include "./config/bdd.php";
include './config/autoload.php';

$manager = new Manager();
$control = $manager->getDestinationNames();


if (isset($_GET['dest']) && in_array($_GET['dest'], $control)) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="./CSS/selected_destination.css">
        <title>Destinations</title>
    </head>

    <body id="body">
        <nav id="navbar" class="flex flex-row items-center img-fluid ">
            <img id="logo3" src="./images/logo3.png" class="img-fluid ">
        </nav>
        <a id="returnHome" class="text-blue-900 text-xl" href="./index.php"> Retour page accueil</a>
        <h1 id="titledestination" class="img-fluid text-blue-900 text-center text-6xl italic"><br><?= $_GET['dest'] ?></h1><br><br><br><br>
        <table class="table">
            <thead class="bg-blue-100">
                <tr>
                    <th scope="col" class="text-m">Opérateur</th>
                    <th scope="col" class="text-m">Notes</th>
                    <th scope="col" class="text-m">Prix</th>
                </tr>
            </thead>
        </table>
        <div class="NoteImageRevue">
            <div class="TOtoDest"><br>
                <div class="TOResult w-70">
                    <?php
                    $TOsNames = $manager->getTONamesByDest($_GET['dest']);

                    foreach ($TOsNames as $key => $value) {
                    ?>
                        <div class="allTO"> <?php
                                            $donneeTO = $manager->prepDataForTO($value);
                                            $premium = new TourOperator($donneeTO);
                                            $result = $premium->getPremium();
                                            if ($result == 1) {
                                            ?><div class="TO"><a href=<?= $donneeTO['link'] ?>><?= $donneeTO['name'] ?></a></div><?php

                                                                                                                                } else {
                                                                                                                                    ?><div class="TO"><?= $value ?></div> <?php
                                                                                                                                                                        } ?>
                            <div class="TONotes">
                                <?php
                                $donneeTO = $manager->prepDataForTO($value);
                                $donneeDEST = $manager->prepDataForDEST($_GET['dest'], $donneeTO['id']);

                                $newDest = new Destination($donneeDEST);
                                $price = $newDest->getPrice();

                                $premium = new TourOperator($donneeTO);
                                $result = $premium->getGrade();

                                ?>
                                <div class='notesStars'>
                                    <?php
                                    if ($result > 0) {
                                    ?><div class='stars'> <?php

                                                            for ($i = 0; $i < $result; $i++) {
                                                                if ($result - $i >= 1) {
                                                            ?><img class="star" src="./images/star.webp" alt="" srcset=""><?php
                                                                                                                        } elseif ($result - $i > 0) {
                                                                                                                            ?><img class="star" src="./images/star-half-yellow.webp" alt="" srcset=""><?php
                                                                                                                                                                                                    }
                                                                                                                                                                                                }

                                                                                                                                                                                                for ($i = 0; $i < 5 - ceil($result); $i++) {
                                                                                                                                                                                                        ?><img class="star" src="./images/star-line-yellow-1.webp" alt="" srcset=""><?php
                                                                                                                                                                                                                                                                } ?>

                                        </div>
                                        <div class="note"><?= $result ?>/5</div> <?php
                                                                                } else { ?>
                                        <div class="note">n/a</div><?php
                                                                                } ?>
                                </div>
                            </div>
                            <div class="price">
                                <?= $price ?>€
                            </div>
                        </div><?php

                            } ?>
                </div>
            </div>
            <div class="imgLocation h-50 w-50 flex flex-row ">
                <?php
                $imgLocation = new Destinationdetail($_GET['dest']);
                $imageFind = $imgLocation->getImage();
                ?><img class="LocImg img-fluid" src=<?= $imageFind['img'] ?> alt="">
            </div>
            <div class="revue">
                <div class="alreadyPostedReview text-xl">
                    <?php
                    $donneeTO = $manager->prepDataForTO($value);
                    $donneeReview = $manager->preparDataForReview($donneeTO['id']);
                    foreach ($TOsNames as $key => $value) {
                    ?><div class="comments text-blue-800"><?php

                                                            $donneeTO = $manager->prepDataForTO($value);
                                                            $donneeReview = $manager->preparDataForReview($donneeTO['id']);
                                                            foreach ($donneeReview as $key => $valueTO) {
                                                                if ($key == 0) {
                                                                    echo ($value . ' : ');
                                                                }
                                                            }

                                                            foreach ($donneeReview as $key => $valueTO) {
                                                                $newreview = new Review($valueTO);
                                                            ?>
                                <div class="commentary">
                                    <div class="author text-red-500">
                                        <?php echo ($newreview->getAuthor() . " : ");
                                        ?>
                                    </div>
                                    <div class="message">
                                        <?php $test = $newreview->getMessage();
                                                                echo ($test); ?>
                                    </div>
                                </div><?php
                                                            } ?>
                        </div><?php

                            }
                                ?></div>
                <div class="newReview w-50 h-50">
                    <form action="./process/addReview.php" method="post">
                        <input class='author border border-sky-900' type="text" name="author" id="author" placeholder="votre nom">
                        <select id="select" name="TO" size="1" class="TOForm rounded bg-blue-300">
                            <?php foreach ($TOsNames as $key => $value) { ?>
                                <option href=<?= $value ?>><?= $value ?> </option> <?php
                                                                                } ?>
                        </select><br>
                        <textarea class="border border-sky-900" name="message" id="message" cols="30" rows="10" placeholder="Laissez-nous votre avis..."></textarea>
                        <input id="inputComment" class="mx-5 text-blue-800 rounded" type="submit" value="Envoyer">
                        <label class="rounded bg-yellow-500">note</label>
                        <select id="select" name="score" size="1" class="TOForm text-yellow-500 ">
                            <?php for ($i = 1; $i < 6; $i++) { ?>
                                <option href=<?= $i ?>><?= $i ?> </option> <?php
                                                                        } ?>
                        </select><br>
                    </form>
                </div>
            </div>
            <footer id="footer" class="align-content text-white text-center font-medium p-10 ">
                <div class="flex flex-row ">
                    <a href="#top"><img id="butTop" class="w-12 " src="./images/Capture.PNG" alt="Retour en haut"></a>
                </div>
                <div class="flex flex-row justify-between text-blue-900">
                    <div id="developpement">
                        <h3>Développement :</h3><br>SARL ANTHEDESIGN<br>Adresse : 12 Rue du Huit Mai 1945,<br>60350 ATTICHY<br>Site Web : www.anthedesign.fr
                    </div>
                    <div id="hebergement">
                        <h3>Hébergement :</h3><br>Hébergeur : SARL ANTHEDESIGN<br>12 Rue du Huit Mai 1945,<br>60350 ATTICHY<br>Site Web : www.anthedesign.fr
                    </div>
                    <div id="editor">
                        <h3>Éditeur du Site :</h2><br>SARL ANTHEDESIGN Numéro de SIRET : 75221735600027<br>Responsable éditorial : Hugo ESSIQUE<br>12 Rue du Huit Mai 1945, 60350 ATTICHY<br>Téléphone : 09 72 21 25 07<br>Email : contact@anthedesign.fr<br>Site Web : www.anthedesign.fr
                    </div>
                </div>
                <div><br>
                    <div class="text-center text-blue-900 ">Production : DEVEAUX Sarah et LAMURE Hugo _2022_ </div>
                </div>
            </footer>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="/JS/main.js"></script>
    </body>

    </html>
<?php

} else {
    header('location:./index.php');
} ?>