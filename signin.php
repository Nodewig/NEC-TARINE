<?php
    include_once("./assets/modules/header.php");
?>

<br/><br/><br/><br/><br/><br/><br/>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <!--Premier form "Créer un compte"-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <form method="post" action="./assets/php/create-account.php">
            <h1>Créer un compte</h1>
            <input type="text" name="txtNom" placeholder="Nom *">
            <input type="text" name="txtPrenom" placeholder="Prénom *">
            <input type="text" name="txtEtablissement" placeholder="Établissement *">
            <input type="text" name="txtId" placeholder="Identifiant/Pseudo *"/>
            <input type="email" name="txtEmail" placeholder="Email *"/>
            <input type="password" name="txtPassword" id="txtPassword" placeholder="Mot de passe *"/>
            <button type="button" id="btnToggle" class="toggle-signup">
                <i id="eyeIcon" class="fa fa-eye"></i>
            </button>
            <input type="submit" value="Créer un compte" name="cmdValiderCreateAccount">
            *Informations obligatoires
            <?php
                if (isset($_GET["error-signup"])) {
                    if ($_GET["error-signup"] == "emptyinput") {
                        echo '<h5>/!\ Remplissez toutes les sections !</h5>';
                    }
                    if ($_GET["error-signup"] == "invaliduid") {
                        echo '<h5>/!\ Saisissez un pseudo valide (caractères : a-z, A-Z, 0-9) !</h5>';
                    }
                    if ($_GET["error-signup"] == "invalidemail") {
                        echo '<h5>/!\ Saisissez un email valide !</h5>';
                    }
                    if ($_GET["error-signup"] == "usernametaken") {
                        echo '<h5>/!\ Choisissez un autre pseudo, celui-ci est déjà pris !</h5>';
                    }
                    if ($_GET["error-signup"] == "none") {
                        echo '<h5>\°v°/ Vous avez été enregistré dans le registre !</h5>';
                    }
                }
            ?>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <!--Deuxième form "Se connecter"-->
        <form method="post" action="./assets/php/login.php">
            <h1>Se connecter</h1>
            <input type="text" name="id" placeholder="Identifiant ou Email"/>
            <input type="password" name="pwd" id="txtPassword" placeholder="Mot de passe"/>
            <a href="#">Mot de passe oublié ?</a>
            
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "no-connect") {
                        echo '<input type="submit" value="Se connecter" name="cmdValiderLoginPanier">';
                    } else {
                        echo '<input type="submit" value="Se connecter" name="cmdValiderLogin">';
                    }
                }
            ?>

            <?php
                if (isset($_GET["error-signin"])) {
                    if ($_GET["error-signin"] == "emptyinput") {
                        echo '<h5>/!\ Remplissez toutes les sections !</h5>';
                    }
                    if ($_GET["error-signin"] == "wronglogin") {
                        echo '<h5>/!\ Identifiant ou Mot de passe incorrecte !</h5>';
                    }
                }
            ?>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Bienvenue !</h1>
                <p>Pour rester connecté avec nous, entrez vos informations personnelles</p>
                <button class="ghost" id="signIn"><< J'ai déjà un compte</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Bon retour parmis nous </h1>
                <p>Entrez vos informations personnelles puis commandez de nouveaux produits !</p>
                <button class="ghost" id="signUp">Pas encore de compte ? >></button>
            </div>
        </div>
    </div>
</div>

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    // Pour activer l'affichage du mot de passe ou non
    let passwordInput = document.getElementById('txtPassword'),
        toggle = document.getElementById('btnToggle'),
        icon = document.getElementById('eyeIcon');
        
        icon.classList.add("fa-eye-slash");
        
        function togglePassword(){
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove("fa-eye-slash");
            } else {
                passwordInput.type = 'password';
                icon.classList.add("fa-eye-slash");
            }
        }

        function checkInput() {

        }

        toggle.addEventListener('click', togglePassword, false);
        passwordInput.addEventListener('keyup', checkInput, false);

</script>

<?php
if (isset($_GET["error-signup"])) {
    echo '<script>container.classList.add("right-panel-active");</script>';
}
if (isset($_GET["error-signin"])) {
    echo '<script>container.classList.remove("right-panel-active");</script>';
}
?>

</body>
</html>