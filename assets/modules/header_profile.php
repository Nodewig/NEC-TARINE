<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Campan Romain">
	<title>NEC'TARINE - Profil</title>
	<link rel="shortcut icon" href="./../images/gt_favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="./../css/bootstrap.min.css">
	<link rel="stylesheet" href="./../css/font-awesome.min.css">

	<!-- Style customisé pour notre template -->
	<link rel="stylesheet" href="./../css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="./../css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top headroom decalage">
		<div class="navbar-header">
			<!-- Boutons pour les plus petits écrans -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="./../../index.php">
				<img src="./../images/gt_favicon.png" alt="NEC-Tarine HTML5 template" width="70px">
			</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav pull-left">
				<li><a href="./paniers.php">Nos produits</a></li>
				<li><a href="./../../contacts.php">Contacts</a></li>
				<?php
				if (isset($_SESSION["useruid"])) {
					// affichage du profil
					echo '<li>
							<img src="./../images/profile.png"
								 class="user-pic"
								 onclick="toggleMenu()">
						  </li>';
					echo '</ul></div>';
					echo '<div class="sub-menu-wrap" id="subMenu">';
					echo '<div class="sub-menu-lignes">
							<div class="uer-info">
							  <img src="./../images/profile.png">
							  <h2>' . $_SESSION["useruid"] . '</h2>
							</div>
							<hr>
							<a href="#" class="sub-menu-link">
								<img src="./../images/profile.png">
								<p>Voir le profile</p>
								<span>></span>
							</a>
							<a href="#" class="sub-menu-link" onClick="toggleSubMenu()">
								<img src="./../images/setting.png">
								<p>Réglages</p>
								<span>></span>
							</a>
							<a href="./../modules/logout.php" class="sub-menu-link">
								<img src="./../images/logout.png">
								<p>Déconnecter</p>
								<span>>></span>
							</a>
						  </div>
						</div>
					  </li>';
					echo '<script>
							let subMenu = document.getElementById("subMenu");

							function toggleMenu(){
								subMenu.classList.toggle("open-menu");
							}
						  </script>
					';
				} else {
					echo '<li class="active">
							<a class="btn" href="./signin.php">SIGN IN / SIGN UP</a>
						  </li>
						</ul>
					</div>';
				}
				?>
			</ul>
		</div>
	</div>