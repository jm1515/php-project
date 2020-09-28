<!DOCTYPE html>
<html lang="en">

<!--TOP SECTION-->
<!--DASHBOARD SECTION-->
<div class="dashboard">

    <div class="db-cent">
        <div class="db-cent-1">
            <p>Bonjour <?php if ($accountinfo['resident_gender'] == 1) { echo 'M. '.$accountinfo['resident_lastname'];} else { echo 'Mme. '.$accountinfo['resident_lastname'];} ?></p>
            <h4>Bienvenue dans votre espace</h4> </div>

        <div class="db-cent-2">

            <a href="" onclick="myFunction()">
                <div class="db-2-main-1">
                    <div class="db-2-main-2"> <img src="view/images/icon/dbc5.png" alt=""> <span>Mes candidatures</span>
                        <p>Consulter la liste de mes candidatures</p>
                         </div>
                </div>
            </a>

            <a href="" onclick="myFunction2()">
                <div class="db-2-main-1">
                    <div class="db-2-main-2"> <img src="view/images/icon/dbc6.png" alt=""> <span>Mes informations</span>
                        <p>Modifier mes données personnelles</p></div>
                </div>
            </a>

            <a href="index.php?page=SearchEstablishment&search=all">
                <div class="db-2-main-1">
                    <div class="db-2-main-2"> <img src="view/images/icon/dbc10.png" alt=""> <span>Candidater</span>
                        <p>Candidater à un établissement</p>
                    </div>
                </div>
            </a>

        </div>

        <div id="myDIV" style="display: none">


            <div class="db-cent-3">
                <div class="db-cent-table db-com-table">
                    <div class="db-title">
                        <h3><img src="view/images/icon/dbc5.png" alt=""/> Mes candidatures : <font color="red"> <?php echo sizeof($accountApplications) ?> </font></h3>
                        <p>Ci-dessous vos candidatures</p>
                    </div>
                    <table class="bordered responsive-table">
                        <thead>
                        <tr>

                            <th>Nom de l'etablissement</th>
                            <th>Date d'envoi</th>
                            <th>Etat de la demande</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i = 0; $i < sizeof($accountApplications); $i++){?>
                            <tr>
                                <td><?php echo $accountApplications[$i]['residence_name'] ?></td>
                                <td><?php echo $accountApplications[$i]['candidature_date'] ?></td>
                                <td><a href="#" class="db-success"><?php echo $accountApplications[$i]['status_candidature_name'] ?></a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="myDIV2" style="display: none">
            <div class="db-cent-3">
                <div class="db-cent-table db-com-table">
                    <div class="db-title">
                        <h3><img src="view/images/icon/dbc6.png" alt=""/> Mes informations personnelles</h3>
                        <p>Ci-dessous vos informations</p>
                    </div>
                    <div class="col-md-12">
                        <div class="head-typo collap-expand book-form inn-com-form">

                            <form class="col s12"  action="index.php?page=Subscription&action=updateUser" method="POST">
                                <div class="row">
                                    <h3>Informations civiles</h3>

                                    <div class="input-field col s6">
                                        <p>Téléphone</p>
                                        <input type="text" class="validate" maxlength="10" name="userNewPhoneNumber" value="<?php echo $accountinfo['resident_phone_number']?>" required>

                                    </div>
                                    <div class="input-field col s6">
                                        <p>Adresse</p>
                                        <input type="text" class="validate" name="userNewAddress" value="<?php echo $accountinfo['resident_address']?>" required>

                                    </div>
                                    <div class="input-field col s6">
                                        <p>Code postale</p>
                                        <input type="text" class="validate" name="userNewPostal" value="<?php echo $accountinfo['resident_postal']?>" required>

                                    </div>
                                    <div class="input-field col s6">
                                        <p>Ville</p>
                                        <input type="text" class="validate" name="userNewCity" value ="<?php echo $accountinfo['resident_city']?>" required>
                                    </div>
                                </div>
                                <br>
                                <center> <button class="btn waves-effect waves-light" type="submit" name="action">Modifier mes informations </button> </center>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div></div>
</div>
</div>


<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
            var y = document.getElementById("myDIV2");
            y.style.display = "none";
        }
    }

    function myFunction2() {
        var x = document.getElementById("myDIV2");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
            var y = document.getElementById("myDIV");
            y.style.display = "none";
        }
    }
</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jun 2018 08:07:53 GMT -->
</html>