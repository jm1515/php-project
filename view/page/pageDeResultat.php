<!DOCTYPE html>
<html lang="en">

<body data-ng-app="">
<!--HEADER SECTION-->

    <!--TOP BANNER-->
    <div class="inn-banner">
        <div class="container">
            <div class="row">
                <h4>Résultats de votre recherche</h4>
            </div>
        </div>
    </div>
    <!--TOP SECTION-->

    <div class="row">
        <div class="page-head">
            <br>   <br>    <br>
            <h2>Filtres</h2>
            <div class="head-title filter">
                <div class="hl-1"></div>
                <div class="hl-2"></div>
                <div class="hl-3"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="head-typo book-form">
                        <form class="col s12" action="index.php" method="GET">
                            <input type="hidden" name="page" value="SearchEstablishment">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="name" type="text" class="validate" placeholder="Nom">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <select name ="price">
                                        <option value="0" disabled selected>Prix</option>
                                        <option value="1500">en dessous de 1500</option>
                                        <option value="2000">entre 1500 et 3000</option>
                                        <option value="3000">au dessus de 3000</option>
                                    </select>
                                </div>
                                <div class="input-field col s4">
                                    <select name = "service">
                                        <option value="" disabled selected>Type</option>
                                        <option value="1">Service Alzheimer</option>
                                        <option value="2">PASA</option>
                                        <option value="3">Unité de soin longue durée</option>
                                    </select>
                                </div>
                                <div class="input-field col s4">
                                    <select>
                                        <option value="" disabled selected>Trier par</option>
                                        <option value="distanceAsc"> Distance Croissant</option>
                                        <option value="distanceDesc"> Distance Décroissant</option>
                                        <option value="prixAsc"> Prix Croissant</option>
                                        <option value="prixDesc"> Prix Décroissant</option>
                                        <option value="nomAsc"> Nom Croissant</option>
                                        <option value="nomDesc"> Nom Décroissant</option>
                                        <option value="noteAsc"> Note Croissant</option>
                                        <option value="noteDesc"> Note Décroissant</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12"><br><br>
                                <center> <button type="submit" class="btn btn-primary">Rechercher <i class="fa fa-search" aria-hidden="true"></i></button></center>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="inn-body-section pad-bot-55">
        <div class="container">

            <form action="index.php" method="GET">
                <input type="hidden" name="page" value="Candidater">
                <div class="fixed">

                    <button class="btn waves-effect waves-light" type="submit">Valider mes candidatures </button>
                </div>

                <div class="row">
                    <div class="page-head">
                        <h2><?php if (sizeof($result) == 1) { echo sizeof($result); ?> Etablissement trouvé</h2><?php } else { echo sizeof($result);?> Etablissements trouvés</h2><?php }?>
                        <div class="head-title">
                            <div class="hl-1"></div>
                            <div class="hl-2"></div>
                            <div class="hl-3"></div>
                        </div>
                    </div>
                    <?php
                    for ($i = 0; $i < sizeof($result); $i++) {
                        ?>
                        <div class="room">
                            <!--ROOM IMAGE-->
                            <div class="r1 r-com">
                            <a href="index.php?page=ResidenceDetails&residence=<?php echo $result[$i]['residence_id']?>">
                                <?php if ($result[$i]['residence_picture_data'] != "" ) {echo '<img src="data:image/jpeg;base64,'.base64_encode( $result[$i]['residence_picture_data'] ).'"/>';}
                                else { echo '<img src="view/images/default.jpg"/>'; } ?>
                            </a>
                            </div>
                            <!--ROOM RATING-->
                            <div class="r2 r-com">
                                <h4><?php echo $result[$i]['residence_name']; ?></h4>
                                <ul>
                                    <li><?php echo $result[$i]['residence_address']; ?></li>
                                </ul>
                            </div>
                            <!--ROOM AMINITIES-->
                            <div class="r3 r-com">
                                <ul><?php for ($a = 0; $a < sizeof($residenceServices[$i]); $a++){ ?>
                                        <li><?php echo $residenceServices[$i][$a]['service_name'] ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!--ROOM PRICE-->
                            <div class="r4 r-com">
                                <p><span class="room-price-1"><?php echo $result[$i]['residence_price']."€"; ?></span>
                                <div class="r2-available"><?php if ($result[$i]['residence_is_available'] == 1){ echo 'Disponible'; } else {echo 'Indisponible';} ?></div>
                                </p>

                            </div>
                            <!--ROOM BOOKING BUTTON-->
                            <div class="r5 r-com">

                                <p>
                                    <input type="checkbox" name="residenceid" id="test.<?php echo $i?>" value="<?php echo  $result[$i]['residence_id']?>" />
                                    <label for="test.<?php echo $i?>"> <font size="4">Candidater</font></label>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>

            </form>

            <button class="btn waves-effect waves-light" id="uncheck-all">Tout effacer </button>
            <button class="btn waves-effect waves-light" id="check-all">Tout sélectionner </button>
        </div>
    </div>

    <form>
        <center>
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>
            </div>
        </center>
    </form>

</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/all-rooms.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jun 2018 08:07:55 GMT -->
</html>