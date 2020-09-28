<!DOCTYPE html>
<html lang="fr">

<body data-ng-app="">
	<!--MOBILE MENU-->
	<section>
		<!--TOP SECTION-->
		<!--TOP BANNER-->
		<div class="inn-banner">
			<div class="container">
				<div class="row">
					<h4>Page d'inscription</h4>
							<ul>
								<li><a href="#">Accueil</a>
								</li>
								<li><a href="#">Inscription</a>
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
						<h2>Inscription</h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
                        
						<p>Veuillez renseigner vos informations d'inscriptions</p>
					</div>
					<!--TYPOGRAPHY SECTION-->
					<div class="col-md-12">
						<div class="head-typo collap-expand book-form inn-com-form">
							
							<form class="col s12" action="index.php?page=Subscription&action=subscribeUser" method="POST">
								<div class="row">

								<div class="input-field col s3">
										<p>
									Civilité :
								        </p>
									</div>

								<div class="input-field col s3">
										<p>
									<input name="userGender" value="1" type="radio" id="perso" />
									<label for="perso">M.</label>
								        </p>
									</div>


                                    <div class="input-field col s3">
										<p>
									<input name="userGender" value="2" type="radio" id="aide" />
									<label for="aide">Mme</label>
								        </p>
									</div>



									<div class="input-field col s6">
                                        <p>Nom</p>
										<input type="text" class="validate" name="userName" required>
									</div>
									<div class="input-field col s6">
                                        <p>Prénom</p>
										<input type="text" class="validate" name="userForeName" required>
									</div>
								</div>
                                	<div class="row">
									<div class="input-field col s6">
                                        <p>Date de naissance</p>
										<input id="birthdate" type="date" class=" input validate " autocomplete="off" name="userBirthDate" required>
									</div>
									<div class="input-field col s6">
                                        <p>Téléphone</p>
										<input type="text" class="validate" maxlength="10" name="userPhoneNumber" required>
									</div>
									<div class="input-field col s6">
                                        <p>Adresse</p>
										<input type="text" class="validate" name="userAddress" required>
									</div>
                                    	<div class="input-field col s6">
                                            <p>Code postale</p>
										<input type="text" class="validate" name="userZipCode" required>
									</div>
                                    	<div class="input-field col s12">
                                            <p>Ville</p>
										<input type="text" class="validate" name="userCity" required>
									</div>

								</div>
								<div class="row">
									<div class="input-field col s12">
                                        <p>Mot de passe</p>
										<input type="password" class="validate" name="userPassword" required>
									</div>
                                    	<div class="input-field col s12">
                                            <p>Confirmer votre mot de passe</p>
										<input type="password" class="validate" required>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
                                        <p>Email</p>
										<input type="email" class="validate" name="userEmail" required>
									</div>
                                    <div class="input-field col s12">
                                        <p>Confirmer votre Email</p>
										<input type="email" class="validate" required>
									</div>
								</div>
                                
                                
                                 <div class="row">
                                <input type="checkbox" id="representant" > 
                                <label for="representant" onclick="myFunction()">Je ne suis pas mon propre représentant légal </label>
                                </div>
                                
                              
                              <div id="myDIV" style="display: none">                                
                              	<div class="row">
                                <br>
                                
							
									<div class="input-field col s12">
										<select>
											<option value="" disabled selected>Type du représentant</option>
											<option value="famille">Famille</option>
                                            <option value="tuteur">Tuteur</option>
											<option value="autre">Autre</option>
											
										</select>
									</div>
					
									<div class="input-field col s6">
										<input type="text" class="validate">
										<label>Nom du représentant</label>
									</div>
                                    <div class="input-field col s6">
										<input type="text" class="validate">
										<label>Prénom du représentant</label>
									</div>
                                     <div class="input-field col s6">
										<input type="text" class="validate">
										<label>Adresse postale du représentant</label>
									</div>
                                    <div class="input-field col s6">
										<input type="text" class="validate">
										<label>Code postale du représentant</label>
									</div>
                                    <div class="input-field col s6">
										<input type="text" class="validate">
										<label>Ville du représentant</label>
									</div>
                                    <div class="input-field col s6">
										<input type="tel" class="validate">
										<label>Numéro de téléphone du représentant</label>
									</div>
								</div>
                            </div>
						           
                                   <div class="row">
                                <input type="checkbox" id="cgu"> 
                                <label for="cgu">En cochant cette case, j'accepte et je reconnais avoir pris connaissance des <a href=""> Conditions générales d'utilisations</a> </label>
                                </div>
                                <div class="row">
                                    <input type="checkbox" id="news">
                                    <label for="news">J'accepte de recevoir les offres promotionnelles et la newsletter. </label>
                                </div>

                                <br><br>
                                <div class="g-recaptcha" data-sitekey="6LcJEmAUAAAAAFbA-_IvAUHA_reBejB2myiWUi7j"></div>

                                <!-- lien pour configurer le captcha : https://www.synbioz.com/blog/mettre_en_place_recaptcha_sur_un_formulaire -->

                                <br>   <br>
                                  <center> <button class="btn waves-effect waves-light" type="submit" name="action">S'inscrire </button> </center>
                                                                
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
	<!--END HEADER SECTION-->


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