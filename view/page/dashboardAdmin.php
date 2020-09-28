<!DOCTYPE html>
<html lang="en">

<body data-ng-app="">
<!--MOBILE MENU-->

<!--HEADER SECTION-->
<section>
    <!--TOP SECTION-->

    </div>
    <!--TOP SECTION-->
    <!--DASHBOARD SECTION-->
    <div class="dashboard">

        <div class="db-cent">
            <div class="db-cent-1">
                <p>Vous êtes connecté(e) en tant que : <?php echo $adminEmail ?></p>
                <h4>Bienvenue dans votre espace</h4> </div>

            <div class="db-cent-2">

                <a href="" onclick="myFunction()">
                    <div class="db-2-main-1">
                        <div class="db-2-main-2"> <img src="view/images/icon/dbc7.png" alt=""> <span>Nouvel établissement</span>
                            <p>Ajouter un nouvel établissement</p></div>
                    </div>
                </a>

                <a href="" onclick="myFunction2()">
                    <div class="db-2-main-1">
                        <div class="db-2-main-2"> <img src="view/images/icon/dbc9.png" alt=""> <span> Compte professionnel</span>
                            <p>Ajouter un compte professionnel</p></div>
                    </div>
                </a>


                <a href="" onclick="myFunction3()">
                    <div class="db-2-main-1">
                        <div class="db-2-main-2"> <img src="view/images/icon/dbc8.png" alt=""> <span>Etablissements</span>
                            <p>Liste d'établissements</p></div>
                    </div>
            </div>
            </a>

            <div id="myDIV" style="display: none">

                <div class="db-cent-3">
                    <div class="db-cent-table db-com-table">
                        <div class="db-title">
                            <h3><img src="view/images/icon/dbc7.png" alt=""/> Ajouter un nouvel etablissement</h3>
                            <p>Ci-dessous le formulaire d'ajout d'un établissement</p>
                        </div>

                        <div class="col-md-12">
                            <div class="head-typo collap-expand book-form inn-com-form">

                                <form class="col s12"  action="index.php?page=Subscription&action=subscribeResidence" enctype='multipart/form-data' method="POST">
                                    <div class="row">
                                        <h3>Ajout d'un nouvel établissement</h3>

                                        <div class="input-field col s12">
                                            <p>Nom de la résidence</p>
                                            <input type="text" class="validate" name="residenceName" required>
                                        </div>

                                        <div class="input-field col s12">
                                            <select name="emailPro">
                                                <option value="" disabled selected>Email du professionnel</option>
                                                <?php for ($i = 0; $i < sizeof($proUsers); $i++){ ?>
                                                <option value="<?php echo $proUsers[$i]['account_id'] ?>"><?php echo $proUsers[$i]['account_email'] ?></option>
                                                <?php } ?>$groupList
                                            </select>
                                        </div>

                                        <div class="input-field col s12">
                                            <select name="statutLegal">
                                                <option value="" disabled selected>Statut juridique</option>
                                                <?php for ($i = 0; $i < sizeof($legal_statusList); $i++){ ?>
                                                    <option value="<?php echo $legal_statusList[$i]['legal_status_id'] ?>"><?php echo $legal_statusList[$i]['legal_status_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>



                                        <div class="input-field col s6">
                                            <p>Email de la résidence</p>
                                            <input type="email" class="validate" name="emailResidence" required>
                                        </div>

                                        <div class="input-field col s6">
                                            <p>Prix</p>
                                            <input type="text" class="validate" name="prixResidence" required>
                                        </div>

                                        <div class="input-field col s6">
                                            <select name="status[]" multiple>
                                                <option value="" disabled selected>Type</option>
                                                <?php for ($i = 0; $i < sizeof($residence_statusList); $i++){ ?>
                                                    <option value="<?php echo $residence_statusList[$i]['residence_status_id'] ?>"><?php echo $residence_statusList[$i]['residence_status_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="input-field col s6">
                                            <select name="grpRattache">
                                                <option value="" disabled selected>Groupe rattaché</option>
                                                <?php for ($i = 0; $i < sizeof($groupList); $i++){ ?>
                                                    <option value="<?php echo $groupList[$i]['residence_groupe_id'] ?>"><?php echo $groupList[$i]['residence_groupe_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="input-field col s12">
                                            <select name="service[]" multiple>
                                                <option value="1" disabled selected>Services</option>
                                                <?php for ($i = 0; $i < sizeof($serviceList); $i++){ ?>
                                                    <option value="<?php echo $serviceList[$i]['service_id'] ?>"><?php echo $serviceList[$i]['service_name'] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <div class="input-field col s6">
                                            <p>Adresse</p>
                                            <input type="text" class="validate" name="proAdress" required>

                                        </div>
                                        <div class="input-field col s6">
                                            <p>Code postale</p>
                                            <input type="text" class="validate" name="proPostalCode" required>

                                        </div>
                                        <div class="input-field col s6">
                                            <p>Ville</p>
                                            <input type="text" class="validate" name="proCity" required>
                                        </div>
                                        <div class="input-field col s6">
                                            <p>Téléphone</p>
                                            <input type="text" class="validate" name="proTel" required>
                                        </div>
                                        <div class="input-field col s6">
                                            <p>Site web</p>
                                            <input type="text" class="validate" name="proSite">
                                        </div>
                                        <div class="input-field col s6">
                                            <p>Photo</p>
                                            <input type="file" class="validate" name="proPhoto" required>
                                        </div>

                                        <div class="input-field col s12">
                                            <p>Dexcriptif texte</p>
                                            <input type="text" class="validate" name="descriptif" required>
                                        </div>
                                    </div>
                                    <br>
                                    <center> <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter un établissement </button> </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="myDIV2" style="display: none">
                <div class="db-cent-3">
                    <div class="db-cent-table db-com-table">
                        <div class="db-title">
                            <h3><img src="view/images/icon/dbc9.png" alt=""/> Ajouter un compte professionnel</h3>
                            <p>Veuillez saisir les informations du compte professionnel</p>
                        </div>

                        <div class="col-md-12">
                            <div class="head-typo collap-expand book-form inn-com-form">

                                <form class="col s12"  action="index.php?page=Subscription&action=subscribeProUser" method="POST">
                                    <div class="row">

                                        <div class="input-field col s12">
                                            <p>Email</p>
                                            <input type="text" class="validate" name="userProEmail" required>

                                        </div>
                                        <div class="input-field col s12">
                                            <p>Mot de passe</p>
                                            <input type="password" class="validate" name="userProPassword" required>

                                        </div>

                                    </div>
                                    <br>
                                    <center> <button class="btn waves-effect waves-light" type="submit" name="action">Créer le compte </button> </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div id="myDIV3" style="display: none">
                <div class="db-cent-3">
                    <div class="db-cent-table db-com-table">
                        <div class="db-title">
                            <h3><img src="view/images/icon/dbc8.png" alt=""/> Etablissements : <font color="red"> <?php ?> </font></h3>
                            <p>Ci-dessous les établissements inscrits</p>
                        </div>
                        <table class="bordered responsive-table">
                            <thead>
                            <tr>
                                <th>Email du professionnel</th>
                                <th>Nom de l'établissement</th>>
                                <th>Adresse</th>
                                <th>Numéro de téléphone</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for ($a = 0; $a < sizeof($residenceList); $a++){?>
                                <tr>
                                    <td><?php echo $residenceList[$a]['residence_email'] ?></td>
                                    <td><?php echo $residenceList[$a]['residence_name'] ?></td>
                                    <td><?php echo $residenceList[$a]['residence_address'] ?></td>
                                    <td><?php echo $residenceList[$a]['residence_phone_number'] ?></td>

                                    </td>
                                </tr>
                            <?php } ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <!--END DASHBOARD SECTION-->
    <!--TOP SECTION-->

</section>

<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
            var y = document.getElementById("myDIV2");
            var z = document.getElementById("myDIV3");
            y.style.display = "none";
            z.style.display = "none";
        }
    }

    function myFunction2() {
        var x = document.getElementById("myDIV2");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
            var y = document.getElementById("myDIV");
            var z = document.getElementById("myDIV3");
            y.style.display = "none";
            z.style.display = "none";
        }
    }


    function myFunction3() {
        var x = document.getElementById("myDIV3");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
            var y = document.getElementById("myDIV");
            var z = document.getElementById("myDIV2");
            y.style.display = "none";
            z.style.display = "none";
        }
    }

</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jun 2018 08:07:53 GMT -->
</html>
