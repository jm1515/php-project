<!DOCTYPE html>
<html lang="en">

<body data-ng-app="">

<!--HEADER SECTION-->
<section>
    <!--TOP SECTION-->

    <!--TOP SECTION-->
    <!--DASHBOARD SECTION-->
    <div class="dashboard">

        <div class="db-cent">
            <div class="db-cent-1">
                <p>Vous êtes connecté(e) en tant que : <?php echo $accountinfo ?></p>
                <h4>Bienvenue dans votre espace</h4> </div>


            <div class="db-cent-3">
                <div class="db-cent-table db-com-table">
                    <div class="db-title">
                        <h3><img src="view/images/icon/dbc5.png" alt=""/> Mes candidatures reçues : <font color="red"><?php echo sizeof($accountApplications) ?></font></h3>
                        <p>Ci-dessous vos candidatures reçues</p>
                    </div>
                    <table class="bordered responsive-table">
                        <thead>
                        <tr>
                            <th>Résidence</th>
                            <th>Date de candidature</th>
                            <th>Statut de la candidature</th>
                            <th>Télécharger dossier</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i =0; $i < sizeof($accountApplications); $i++){?>
                        <tr>
                            <td><?php echo $accountApplications[$i]['residence_name'] ?></td>
                            <td><?php echo  $accountApplications[$i]['candidature_date'] ?></td>
                            <td><?php echo  $accountApplications[$i]['status_candidature_name']?></td>
                            <td><a href="#" class="db-success">Télécharger le dossier</a></td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

    </div>
    <!--END DASHBOARD SECTION-->
    <!--TOP SECTION-->
    <!--END HEADER SECTION-->

</section>
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