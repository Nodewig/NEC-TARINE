<?php
    include_once("./assets/modules/header.php");
?>
    <br><br><br><br><br><br>
    <div class="container">
		<form action="./assets/php/send-mail.php" method="post">
			<label for="nom">Nom :</label>
			<input type="text" id="nom" name="nom" required>

			<label for="email">Email :</label>
			<input type="email" id="email" name="email" required>

            <label for="sujet">Sujet :</label>
			<input type="text" id="sujet" name="sujet" required>

			<label for="message">Message :</label>
			<textarea id="message" name="message" required></textarea>

			<input type="submit" value="Envoyer"/>
		</form>
	</div>
    <div class="container-res">
        <label>Nos réseaux sociaux :</label>
        <div class="social-links-contact">
        	<a href="https://www.youtube.com/" target="_blank">
                <div class="social-link-contact youtube-contact">
                    <i class="fab fa-youtube no-underline"></i>
                </div>
            </a>
        	<a href="https://www.instagram.com/" target="_blank">
                <div class="social-link-contact instagram-contact">
                    <i class="fab fa-instagram no-underline"></i>
                </div>
            </a>
        	<a href="https://twitter.com/" target="_blank">
                <div class="social-link-contact twitter-contact">
                    <i class="fab fa-twitter no-underline"></i>
                </div>
            </a>
        </div>
    </div>
    

<link rel="stylesheet" href="./assets/css/font-awesome.min.css">
</body>
</html>