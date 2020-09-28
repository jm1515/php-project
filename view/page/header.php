<!DOCTYPE html>
<html lang="en">

<!-- user 0, 1 pro, 2 admin -->
<body data-ng-app="">
	
	<header>
		<div class="menu-section">
			<div class="container">
				<div class="row">
					<div class="logo">
						<a href="index.php"><img src="view/images/logo.png" alt="" /></a>
					</div>
					<div class="menu-bar">
						<ul>
							<li><a href="index.php">Accueil</a>
							</li>
                            <?php if(isset($_SESSION['login'])) {
                                ?><li><a href="index.php?page=Profile">Mon profil</a>
                                <li><a href="index.php?page=Connexion&action=disconnectUser">Déconnexion</a>
                                <?php
                            }
                            else {
                                ?><li><a href="index.php?page=Subscription">Inscription</a></li>
                            <li><a href="index.php?page=Connexion">Mon compte</a>
                                <?php
                            }?>
							</li>
                            <li><a target="_blank" href="http://www.alepad.fr">Blog</a>
                            </li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!--MOBILE MENU-->
		<div class="mm">
			<div class="mm-inn">
				<div class="mm-logo">
					<a href="index.php"><img src="view/images/logo.png" alt="">
					</a>
				</div>
				<div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span>
				</div>
				<div class="mm-menu">
					<div class="mm-close"><span><i class="fa fa-times hide-menu" aria-hidden="true"></i></span>
					</div>
					<ul>
                        <li><a href="index.php">Accueil</a>
                        </li>
                        <?php if(isset($_SESSION['login'])) {
                            ?><li><a href="index.php?page=Profil">Profil</a>
                            <li><a href="index.php?page=Connexion&action=disconnectUser"> <?php echo $_SESSION['username']; ?>Déconnexion</a>
                            <?php
                        }
                        else {
                        ?>
                        <li><a href="index.php?page=Subscription">Inscription</a></li>
                        <li><a href="index.php?page=Connexion">Connexion</a><?php
                            }?>

                        </li>
					</ul>
				</div>
			</div>
		</div>
	</header>

</body>

</html>