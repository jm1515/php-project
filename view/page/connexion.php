<!DOCTYPE html>
<html lang="en">

<body data-ng-app="">

<!--TOP SECTION-->
<!--TOP BANNER-->
<div class="inn-banner">
    <div class="container">
        <div class="row">
            <h4>Page de connexion</h4>
            <ul>
                <li><a href="#">Accueil</a>
                </li>
                <li><a href="#">Connexion</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--TOP SECTION-->
<div class="inn-body-section pad-bot-55">
    <div class="container">
        <div class="row">
            <div class="page-head">
                <h2>Connexion</h2>
                <div class="head-title">
                    <div class="hl-1"></div>
                    <div class="hl-2"></div>
                    <div class="hl-3"></div>
                </div>
                <?php if(isset($_SESSION['connexion']) == "failed") { ?>
                    <div class="error_msg"><p>Vos identifiants sont incorrect !</p></div>
                <?php }else { ?>
                    <p>Veuillez renseigner vos informations de connexion</p>
                <?php } ?>
            </div>
            <!--TYPOGRAPHY SECTION-->
            <div class="col-md-12">
                <div class="head-typo collap-expand book-form inn-com-form">

                    <form class="col s12" action="index.php?page=Connexion&action=connectUser" method="POST">

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="email" class="validate" name="email">
                                <label>Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" class="validate" name="password">
                                <label>Mot de passe</label>
                            </div>
                        </div>

                        <br><br>
                        <a href="index.php?page=Forgetpwd">Mot de passe oublié ? </a>

                        <br>   <br>
                        <center> <button class="btn waves-effect waves-light" type="submit" name="action">Valider</button> </center>

                    </form>

                </div>
            </div>

            <!--END TYPOGRAPHY SECTION-->
        </div>


    </div>
</div>
<!--TOP SECTION-->
<!--TOP SECTION-->

</section>

</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/form-fields.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jun 2018 08:07:55 GMT -->
</html>