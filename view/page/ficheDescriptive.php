<!DOCTYPE html>
<html lang="en">

<body data-ng-app="">
<!--MOBILE MENU-->
<section>
    <!--TOP SECTION-->

    <div class="inn-banner">
        <div class="container">
            <div class="row">
                <h4>Details de l'établissement</h4>
            </div>
        </div>
    </div>
    <!--END HOTEL ROOMS-->
    <div class="hom-com">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span><?php echo $residenceDetails[0]['residence_name']?></span></h4>
                                <p></p>
                            </div>
                            <div class="hp-amini">
                                <p>Tél: <?php echo $residenceDetails[0]['residence_phone_number']?><br>
                                    Adresse : <?php echo $residenceDetails[0]['residence_address']?>
                                <p><br>
                                <center>
                                    <div id="map"></div>
                                    <script>
                                        // Initialize and add the map
                                        function initMap() {
                                            // The location of Uluru
                                            var uluru = {lat: 48.9210234, lng: 2.532148799999959};
                                            // The map, centered at Uluru
                                            var map = new google.maps.Map(
                                                document.getElementById('map'), {zoom: 13, center: uluru});
                                            // The marker, positioned at Uluru
                                            var marker = new google.maps.Marker({position: uluru, map: map});

                                        }
                                    </script>
                                    <!--Load the API from the specified URL
                                    * The async attribute allows the browser to render the page while the API loads
                                    * The key parameter will contain your own API key (which is not needed for this tutorial)
                                    * The callback parameter executes the initMap() function
                                    -->
                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiJ_VXiVcsmtzLoa84R7isv0aD0DN9Npw&callback=initMap">
                                    </script>
                                </center>
                                </p>
                            </div>
                        </div>
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Gallerie Photo</span></h4>
                            </div>
                            <div class="">
                                <div class="h-gal">
                                    <ul>
                                        <li><img class="materialboxed" data-caption="Hotel Captions" src="view/images/room/1.jpg" alt="">
                                        </li>
                                        <li><img class="materialboxed" data-caption="Hotel Captions" src="view/images/room/2.jpg" alt="">
                                        </li>
                                        <li><img class="materialboxed" data-caption="Hotel Captions" src="view/images/room/3.jpg" alt="">
                                        </li>
                                        <li><img class="materialboxed" data-caption="Hotel Captions" src="view/images/room/4.jpg" alt="">
                                        </li>
                                        <li><img class="materialboxed" data-caption="Hotel Captions" src="view/images/room/5.jpg" alt="">
                                        </li>
                                        <li><img class="materialboxed" data-caption="Hotel Captions" src="view/images/room/6.jpg" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Notes</span></h4>
                            </div>
                            <div class="hp-review">
                                <div class="hp-review-right">
                                    <h5>Évaluation générale</h5>
                                    <p><span><?php $note=0; for ($a=0; $a < sizeof($commentlist); $a++){ $note += $commentlist[$a]['comment_rate'];} echo $note/sizeof($commentlist)?><i class="fa fa-star" aria-hidden="true"></i></span> basé sur <?php echo sizeof($commentlist) ?> avis</p>
                                </div>
                            </div>
                        </div>
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Avis des internautes</span></h4>
                            </div>
                            <div class="lp-ur-all-rat">
                                <ul>
                                    <?php for ($i=0; $i < sizeof($commentlist); $i++){?>
                                    <li>
                                        <div class="lr-user-wr-con">
                                            <h6><?php echo $commentlist[$i]['comment_title'] ?><span><?php echo $commentlist[$i]['comment_rate'] ?> <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date"><?php echo $commentlist[$i]['comment_publishing_date'] ?></span>
                                            <p><?php echo $commentlist[$i]['comment_message'] ?> </p>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>  <?php if (isset($_SESSION['userinfo'])){?> <a id="avis_button" class="waves-effect waves-light wr-re-btn" href="%21.html#" data-toggle="modal" data-target="#commend"><i class="fa fa-edit"></i> Écrire un avis</a> <?php }?>
                            </div>
                        </div>
                        <div id="avis_com" style="display: none;" class="col-md-6">
                            <form action="index.php?page=Comment&action=postComment" method="POST">
                                <input type="hidden" name="residence" value="<?php echo $_GET['residence'] ?>">
                                <div  style="border:none !important;" class="head-typo typo-com collap-expand">
                                    <h2>Écrire un avis</h2>
                                    <div>
                                        <fieldset>
                                        <span class="star-cb-group">
                                          <input type="radio" id="rating-4" name="rating" value="1" checked="checked" /><label for="rating-4">1</label>
                                          <input type="radio" id="rating-3" name="rating" value="2" /><label for="rating-3">2</label>
                                          <input type="radio" id="rating-2" name="rating" value="3" /><label for="rating-2">3</label>
                                          <input type="radio" id="rating-1" name="rating" value="4" /><label for="rating-1">4</label>
                                          <input type="radio" id="rating-0" name="rating" value="5" class="star-cb-clear" /><label for="rating-0">5</label>
                                        </span>
                                        </fieldset>
                                    </div>

                                    <div class="input-field col s12">
                                        <textarea class="materialize-textarea" name="commentText"></textarea>
                                        <label class="active">Votre avis...</label>

                                    </div>
                                </div><button class=" wr-re-btn" type="submit">Envoyer</button>
                                <a id="button_annuler" class=" wr-re-btn btn-danger">Annuler</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--=========================================-->
                    <div class="hp-call hp-right-com">
                        <div class="hp-call-in"> <img src="view/images/icon/dbc4.png" alt="">
                            <h3><span><?php echo $residenceDetails[0]['residence_name']?></span> <?php echo $residenceDetails[0]['residence_price']?>€</h3> <a href="index.php?page=Candidater&residenceid=<?php echo $residenceDetails[0]['residence_id']?>">Candidater</a> </div>
                    </div>

                    <!--=========================================-->
                    <!--=========================================-->
                    <div class="hp-card hp-right-com">
                        <br><br>
                        <div class="hp-card-in">
                            <h3><?php echo $residenceDetails[0]['residence_phone_number']?></h3></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div>
            <!--TOP SECTION-->

        </div>
    </div>
</section>

</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/room-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jun 2018 08:07:32 GMT -->
</html>