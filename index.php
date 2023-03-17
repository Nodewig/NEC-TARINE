<?php
    include_once("./assets/modules/header.php");
?>

<header id="head">
	<div>
        <img src="./assets/images/gt_favicon.png" alt="NEC-Tarine HTML5 template"/>
		<h1 class="lead">NEC-TARINE</h1>
		<p class="tagline">Mangez des fruits plus simplement en cliquant sur des boutons</p>
		<p>
            <a href="./assets/php/paniers.php" class="btn btn-default btn-lg" role="button">Nos produits >></a>
            <?php
				if (isset($_SESSION["useruid"])) {
					// affichage du profil
                    echo '<a href="./assets/modules/logout.php" class="btn btn-action btn-lg" role="button">Log Out -></a>';
                } else {
                    echo '<a href="./signin.php" class="btn btn-action btn-lg" role="button">Se connecter >></a>';
                }
            ?>
        </p>
	</div>
</header>
<link rel="stylesheet" href="./assets/css/font-awesome.min.css">
</body>
</html>