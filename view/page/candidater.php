<!DOCTYPE html>
<html lang="en">

<body data-ng-app="">

<div class="inn-banner">
    <div class="container">
        <div class="row">
            <h4>Page de candidature</h4>

            <ul>
                <li><a href="#">Résultats</a>
                </li>
                <li><a href="#">Candidature</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="inn-body-section pad-bot-55">
    <div class="container">
        <div class="row">
            <div class="page-head">
                <h2>Création du dossier</h2>
                <div class="head-title">
                    <div class="hl-1"></div>
                    <div class="hl-2"></div>
                    <div class="hl-3"></div>
                </div>

                <p>Veuillez renseigner vos informations de candidature</p>
            </div>
            <!--TYPOGRAPHY SECTION-->
            <div class="col-md-12">
                <div class="head-typo collap-expand book-form inn-com-form">

                    <form class="col s12" action="index.php?page=Profile&action=submitCandidature" method="POST">
                        <div class="row">
                            <center><h2>Prise en charge</h2>
                                <div class="head-title">
                                    <div class="hl-1"></div>
                                    <div class="hl-2"></div>
                                    <div class="hl-3"></div>
                                </div>  </center>

                            <div class="input-field col s4">

                                <p>Type de financement :</p>
                            </div>
                            <div class="input-field col s4">
                                <input name="perso" type="radio" id="perso" />
                                <label for="perso">Personnel</label>
                            </div>


                            <div class="input-field col s4">
                                <input name="aide" type="radio" id="aide" />
                                <label for="aide">Aide sociale</label>
                            </div>

                            <div class="input-field col s4">
                                <p>Dossier aide sociale en cours :</p>
                            </div>

                            <div class="input-field col s4">

                                <input name="ouidossier" type="radio" id="oui" />
                                <label for="oui">Oui</label>

                            </div>

                            <div class="input-field col s4">
                                <input name="nondossier" type="radio" id="non" />
                                <label for="non">Non</label>
                            </div>

                            <div class="input-field col s6">
                                <p>Budget max</p>
                                <input type="text" class="validate">
                            </div>

                            <div class="input-field col s6">
                                <p>GIR (1 à 6) </p>
                                <input type="text" class="validate" name="gir">
                            </div>

                            <input type="hidden" class="validate" name="residenceid" value="<?php echo $_GET['residenceid']?>">

                        </div>

                        <center><h2><br><br>Dossier d'inscription</h2>
                            <div class="head-title">
                                <div class="hl-1"></div>
                                <div class="hl-2"></div>
                                <div class="hl-3"></div>
                            </div>  </center><br><br>


                        <p style="color: #f5941e; font-size: 18px; text-align: center">Remplissez le dossier ci-dessous directement ou imprimez le, remplissez le, puis scanez le.</p>
                        <center><a href="view/docs/dossierInscription.docx" class="btn waves-effect waves-light" download>Télécharger le dossier d'inscription</a></center>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <p style="color: #f5941e; font-size: 18px; text-align: center"> Insérer le fichier avec vos informations remplies.</p>
                            <center>
                                <div class="input-field col s6">
                                    <p style="text-align: center">Dossier médical</p>
                                    <input type="file" id="myFile1" name="">
                                </div>


                                <div class="input-field col s6">
                                    <p style="text-align: center">Dossier d'inscription</p>
                                    <input type="file" id="myFile" name="">
                                </div>
                            </center>
                        </div>
                        <br>   <br>
                        <?php if (isset($_SESSION['userinfo'])){ ?>
                        <center> <button class="btn waves-effect waves-light" type="submit" name="action">Je soummet mon dossier </button> </center>
                        <?php } else { ?>
                        <center> <a a href="index.php?page=Subscription" class="btn waves-effect waves-light"  name="action">Je m'inscrit avant de pouvoir candidater</a> </center>
                        <?php } ?>
                        <br><br>
                        <font size="2">En cliquant sur « Je soummet mon dossier », vous confirmez que vous acceptez les <a href="view/docs/cgu.pdf" target="_blank">Conditions générales d'utilisations</a></font>
                    </form>


                </div>
            </div>

            <!--END TYPOGRAPHY SECTION-->
        </div>


    </div>
</div>
<!--TOP SECTION-->


<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/form-fields.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jun 2018 08:07:55 GMT -->
</html>