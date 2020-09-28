<!DOCTYPE html>
<html lang="en">

<body data-ng-app="">

<section>
    <!--TOP SECTION-->
    <div>
        <div class="residence-title">
            <center><h2>La meilleure façon de trouver sa maison de retraite</h2></center>

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="head-typo book-form">
                            <form class="col s12" action="index.php" method="GET">
                                <input type="hidden" name="page" value="SearchEstablishment">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select name="service">
                                            <option value="" disabled selected>Type</option>
                                            <option value="1">Service Alzheimer</option>
                                            <option value="2">PASA</option>
                                            <option value="3">Unité de soin longue durée</option>
                                        </select>

                                    </div>
                                    <div class="input-field col s6">
                                        <select name="department">
                                            <option value="" disabled selected>Lieu</option>
                                            <option value="78">Yvelines</option>
                                            <option value="75">Paris</option>
                                            <option value="92">Hauts-de-Seine</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3"><br><br><br>
                        <button type="submit" class="btn btn-primary">Rechercher <i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="blog hom-com details-site" id="description-site">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Comment trouver votre maison de retraite idéale ?</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="thumbnail text-center worksContent">
                        <div class="caption">
                            <h3>Pourquoi ? </h3>
                            <p>C'est très simple et 100% gratuit. C'est la meilleure façon de trouver sa maison de retraite. Comparez et sélectionnez les meilleures offres les plus adaptée à la situation de votre proche agé, en fonction de son degré d’autonomie, de sa situation géographique, sociale et financière.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="thumbnail text-center worksContent">
                        <div class="caption">
                            <h3>Les avis pour vous aider</h3>
                            <p>Notre objectif est de vous guider au mieux. Nous vous avons donc donné la possibilité d’affiner votre choix en fonction des notes, des commentaires et avis laissés par les clients qui auront utilisé les differentes résidences de nos professionnels. Découvrez notre séléction de maisons de retraite.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="thumbnail text-center worksContent">
                        <div class="caption">
                            <h3>Une solution pour se loger</h3>
                            <p>Basé sur des contrats d’exclusivité avec des groupes privés lucratifs, nous apportons une vraie solution gratuite et complète pour se loger lorsque l’on arrive à l’âge de la retraite. Quelque soit son degré d’autonomie ou de dépendance, notre site pourra s'adapter à votre recherche de maisons de retraite.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i>
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4"><?php echo $statistics[0]['nb_etablissements']; ?> <br> Etablissements</span> <span class="ol-3"></span>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i>
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4">50 <br> Visites par jours</span> <span class="ol-3"></span>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i>
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4"><?php echo $statistics[0]['nb_avis_deposes']; ?> <br> Avis déposées</span> <span class="ol-3"></span>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <!--HOTEL ROOMS SECTION-->
    <div class="hom1 hom-com pad-bot-40">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Nos établissements les mieux notés</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="to-ho-hotel">
                    <!-- HOTEL GRID -->
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <?php if ($bestresidences[0]['residence_picture_data'] != "" ) {echo '<img src="data:image/jpeg;base64,'.base64_encode( $bestresidences[0]['residence_picture_data'] ).'"/>';}
                                else { echo '<img src="view/images/default.jpg"/>'; } ?>
                            </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="all-rooms.html"><h4><?php echo $bestresidences[0]['residence_name']?></h4></a> </div>
                                <ul>
                                    <li><?php echo $bestresidences[0]['residence_city']?>
                                        <div class="dir-rat-star ho-hot-rat-star"> Note:
                                            <i class="fa fa-star<?php if ($bestresidences[0]['residence_rate'] < 1) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[0]['residence_rate'] < 2) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[0]['residence_rate'] < 3) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[0]['residence_rate'] < 4) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[0]['residence_rate'] < 5) {echo '-o';} ?>" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <?php if ($bestresidences[1]['residence_picture_data'] != "" ) {echo '<img src="data:image/jpeg;base64,'.base64_encode( $bestresidences[1]['residence_picture_data'] ).'"/>';}
                                else { echo '<img src="view/images/default.jpg"/>'; } ?>
                            </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="all-rooms.html"><h4><?php echo $bestresidences[1]['residence_name']?></h4></a> </div>
                                <ul>
                                    <li><?php echo $bestresidences[1]['residence_city']?>
                                        <div class="dir-rat-star ho-hot-rat-star"> Note:
                                            <i class="fa fa-star<?php if ($bestresidences[1]['residence_rate'] < 1) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[1]['residence_rate'] < 2) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[1]['residence_rate'] < 3) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[1]['residence_rate'] < 4) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[1]['residence_rate'] < 5) {echo '-o';} ?>" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- HOTEL GRID -->
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <?php if ($bestresidences[2]['residence_picture_data'] != "" ) {echo '<img src="data:image/jpeg;base64,'.base64_encode( $bestresidences[2]['residence_picture_data'] ).'"/>';}
                                else { echo '<img src="view/images/default.jpg"/>'; } ?>
                            </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="all-rooms.html"><h4><?php echo $bestresidences[2]['residence_name']?></h4></a> </div>
                                <ul>
                                    <li><?php echo $bestresidences[2]['residence_city']?>
                                        <div class="dir-rat-star ho-hot-rat-star"> Note:
                                            <i class="fa fa-star<?php if ($bestresidences[2]['residence_rate'] < 1) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[2]['residence_rate'] < 2) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[2]['residence_rate'] < 3) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[2]['residence_rate'] < 4) {echo '-o';} ?>" aria-hidden="true"></i>
                                            <i class="fa fa-star<?php if ($bestresidences[2]['residence_rate'] < 5) {echo '-o';} ?>" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END HOTEL ROOMS-->



    <div class="">
        <div>
            <!--TOP SECTION-->

        </div>
    </div>
</section>

</body>

</html>