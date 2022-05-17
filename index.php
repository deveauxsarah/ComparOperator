<?php
include "./config/bdd.php";
include './config/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 'on');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="./CSS/main.css" media="screen" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>comparOperator</title>
</head>

<body id="body">
    <?php
    $classe = new Manager();
    $info = $classe->getDestinationNames();
    ?>
    <nav id="navbar" class="flex flex-row items-center ">
        <img id="logo3" src="./images/logo3.png" class=" ">
        <img id="logo4" src="./images/logo4.png">
    </nav>
    <section id="chooseDestination" class="text-center ">
        <ul id="destination" class="flex flex-row text-white font-normal text-lg">
            <li class="mx-2 p-2 rounded ease-in-out transition duration-500 ease-in-out">
                <form action="./selected_destination.php" method="get">
                    <select id="select" name="dest" size="1" class="rounded flex flex-row text-gray-700 text-2xl italic ">
                        <?php foreach ($info as $key => $value) { ?>
                            <option href=<?= $value ?>><?= $value ?> </option> <?php
                                                                            } ?>
                    </select><br>
                    <button type="submit" id="btnNav" class="text-gray-700 rounded bg-white text-xl italic">Valider</button>
                </form>
            </li>
        </ul>
    </section>
    <section>
        <div id="sliderSettings" class=" ">
            <div id="pSlider" class="pSlider">
                <ol id="slider-container" class="slider-container" dir="ltr">
                    <li id="slide_1" class="li_slide">
                        <div class="slide-snapper"></div>
                        <a class="prev_slide" href="#slide_1"></a>
                        <a class="next_slide" href="#slide_2"></a>
                    </li>
                    <li id="slide_2" class="li_slide">
                        <div class="slide-snapper"></div>
                        <a class="prev_slide" href="#slide_2"></a>
                        <a class="next_slide" href="#slide_3"></a>
                    </li>
                    <li id="slide_3" class="li_slide">
                        <div class="slide-snapper"></div>
                        <a class="prev_slide" href="#slide_3"></a>
                        <a class="next_slide" href="#slide_4"></a>
                    </li>
                    <li id="slide_4" class="li_slide">
                        <div class="slide-snapper"></div>
                        <a class="prev_slide" href="#slide_4"></a>
                        <a class="next_slide" href="#slide_5"></a>
                    </li>
                    <li id="slide_5" class="li_slide">
                        <div class="slide-snapper"></div>
                        <a class="prev_slide" href="#slide_5"></a>
                        <a class="next_slide" href="#slide_1"></a>
                    </li>
                </ol>
            </div>
        </div>
    </section>
    <section id="messageselection" class="text-3xl h-10 text-center italic bg-white text-gray-700">
        Notre sélection du moment pour vous ...
    </section>
    <main>
        <?php include('./utilities/cardsdisplaying.php'); ////// selection des cartes non automatisé
        ?>
        <section>
            <div id="card" style="background-image: url(https://www.alibabuy.com/photos/library/1500/11411.jpg);">
                <div class="box-container">
                    <div class="box-item">
                        <div class="flip-box">
                            <div class="flip-box-front text-center" style="background-image: url(<?= $datacard1["img"] ?>);">
                                <div class="inner color-white">
                                    <h3 id="h3" class="flip-box-header  text-black font-serif italic text-4xl "><?= $datacard1["location"] ?></h3>
                                    <p class="text-black"></p>
                                </div>
                            </div>
                            <div class="flip-box-back text-center" style="background-image: url('https://media.istockphoto.com/illustrations/background-blue-light-soft-abstract-website-wallpaper-illustration-id1329666470?k=20&m=1329666470&s=612x612&w=0&h=WjF1mgbJrTzQfKGL8B2iaKH-Y2Q9--NVwArM58VEN7E=');">
                                <div class="inner color-white">
                                    <h3 class="flip-box-header"><?= $datacard1["title"] ?></h3>
                                    <p><?= $datacard1["description"] ?></p>
                                    <button onclick="document.location.href='selected_destination.php?dest=<?= $datacard1['location'] ?>';" class="flip-box-button">découvrir</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-item">
                        <div class="flip-box">
                            <div class="flip-box-front text-center" style="background-image: url('<?= $datacard2["img"] ?>');">
                                <div class="inner color-white">
                                    <h3 id="h3" class="flip-box-header text-black font-serif italic text-4xl "><?= $datacard2["location"] ?></h3>
                                    <p class="text-black"></p>
                                </div>
                            </div>
                            <div class="flip-box-back text-center" style="background-image: url('https://media.istockphoto.com/illustrations/background-blue-light-soft-abstract-website-wallpaper-illustration-id1329666470?k=20&m=1329666470&s=612x612&w=0&h=WjF1mgbJrTzQfKGL8B2iaKH-Y2Q9--NVwArM58VEN7E=');">
                                <div class="inner color-white">
                                    <h3 class="flip-box-header"><?= $datacard2["title"] ?></h3>
                                    <p> <?= $datacard2["description"] ?></p>
                                    <button onclick="document.location.href='selected_destination.php?dest=<?= $datacard2['location'] ?>';" class="flip-box-button">découvrir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-item">
                        <div class="flip-box">
                            <div class="flip-box-front text-center filter-" style="background-image: url('<?= $datacard3["img"] ?>');">
                                <div class="inner color-white">
                                    <h3 id="h3" class="flip-box-header text-black font-serif italic text-4xl "><?= $datacard3["location"] ?></h3>
                                    <p></p>
                                </div>
                            </div>
                            <div class="flip-box-back text-center" style="background-image: url('https://media.istockphoto.com/illustrations/background-blue-light-soft-abstract-website-wallpaper-illustration-id1329666470?k=20&m=1329666470&s=612x612&w=0&h=WjF1mgbJrTzQfKGL8B2iaKH-Y2Q9--NVwArM58VEN7E=');">
                                <div class="inner color-white">
                                    <h3 class="flip-box-header"><?= $datacard3["title"] ?></h3>
                                    <p> <?= $datacard3["description"] ?></p>
                                    <button onclick="document.location.href='selected_destination.php?dest=<?= $datacard3['location'] ?>';" class="flip-box-button">découvrir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-item">
                        <div class="flip-box">
                            <div class="flip-box-front text-center filter-" style="background-image: url('<?= $datacard4["img"] ?>');">
                                <div class="inner color-white">
                                    <h3 id="h3" class="flip-box-header text-black font-serif italic text-4xl "><?= $datacard4["location"] ?></h3>
                                    <p></p>
                                </div>
                            </div>
                            <div class="flip-box-back text-center" style="background-image: url('https://media.istockphoto.com/illustrations/background-blue-light-soft-abstract-website-wallpaper-illustration-id1329666470?k=20&m=1329666470&s=612x612&w=0&h=WjF1mgbJrTzQfKGL8B2iaKH-Y2Q9--NVwArM58VEN7E=');">
                                <div class="inner color-white">
                                    <h3 class="flip-box-header"><?= $datacard4["title"] ?></h3>
                                    <p><?= $datacard4["description"] ?></p>
                                    <button onclick="document.location.href='selected_destination.php?dest=<?= $datacard4['location'] ?>';" class="flip-box-button" href>découvrir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-item">
                        <div class="flip-box">
                            <div class="flip-box-front text-center filter-" style="background-image: url('<?= $datacard5["img"] ?>');">
                                <div class="inner color-white">
                                    <h3 id="h3" class="flip-box-header text-black font-serif italic text-4xl "><?= $datacard5["location"] ?></h3>
                                    <p></p>
                                </div>
                            </div>
                            <div class="flip-box-back text-center" style="background-image: url('https://media.istockphoto.com/illustrations/background-blue-light-soft-abstract-website-wallpaper-illustration-id1329666470?k=20&m=1329666470&s=612x612&w=0&h=WjF1mgbJrTzQfKGL8B2iaKH-Y2Q9--NVwArM58VEN7E=');">
                                <div class="inner color-white">
                                    <h3 class="flip-box-header"><?= $datacard5["title"] ?></h3>
                                    <p><?= $datacard5["description"] ?></p>
                                    <button onclick="document.location.href='selected_destination.php?dest=<?= $datacard5['location'] ?>';" class="flip-box-button">découvrir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <section id="messageselection" class="">
            <p class="text-3xl h-8 text-center italic bg-white text-gray-700">
                Succombez à nos destinations pour vos prochaines vaccances ...
            </p>
        </section>
        <section>
            <div id="allDestination" class="bg-white">
                <!-- <div class="allDestination">

            <?php
            $newdest = new Manager();
            $destination = $newdest->getAllDestination();
            ?>
        </div> -->
                <div class="containerGrid bg-white">

                    <main class="grid">

                        <?php foreach ($info as $key => $value) { ?>
                            <article>
                                <a href="./selected_destination.php?dest=<?= $value ?>">
                                    <?php
                                    $imgLocation = new Destinationdetail($value);
                                    $imageFind = $imgLocation->getImage();
                                    ?><div class="imgBox"><img class="gridimgage" src=<?= $imageFind['img'] ?> alt=""></div>
                                    <div class="text">
                                        <h3><?= $value ?></h3>
                                    </div>
                                </a>

                            </article>
                        <?php     } ?>
                    </main>
                </div>
        </section>
    </main>
    <footer id="footer" class="align-content text-white text-center font-medium p-10 ">
        <div class="flex flex-row ">
            <a href="#top"><img id="butTop" class="w-12 " src="./images/Capture.PNG" alt="Retour en haut"></a>
        </div>
        <!-- <div id="mentions" class="flex flex-row justify-around ">
            <div id="developpement">
                <h3>Développement :</h3><br>SARL ANTHEDESIGN<br>Adresse : 12 Rue du Huit Mai 1945, 60350 ATTICHY<br>Site Web : www.anthedesign.fr
            </div>
            <div id="hebergement">
                <h3>Hébergement :</h3><br>Hébergeur : SARL ANTHEDESIGN<br>12 Rue du Huit Mai 1945, 60350 ATTICHY<br>Site Web : www.anthedesign.fr
            </div>        
            <div id="editor">
                <h3>Éditeur du Site :</h2><br>SARL ANTHEDESIGN Numéro de SIRET : 75221735600027<br>Responsable éditorial : Hugo ESSIQUE<br>12 Rue du Huit Mai 1945, 60350 ATTICHY<br>Téléphone : 09 72 21 25 07<br>Email : contact@anthedesign.fr<br>Site Web : www.anthedesign.fr
            </div>
        </div> -->
        <div id="label" class="text-center text-gray-900">DEVEAUX Sarah & LAMURE Hugo _2022</div>
    </footer>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="./JS/main.js"></script>
</body>

</html>