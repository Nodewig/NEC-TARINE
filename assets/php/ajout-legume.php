<?php

if (isset($_POST["ajouterLegume"])) {
    // Récupération des données de formulaire
    $nom = $_REQUEST["nom"];
    $saison = $_REQUEST["saison"];
    $label = $_REQUEST["label"];

    require_once("./connexion.php");
    require_once("./function.php");

    //Checks
    if (emptyInputSignup($nom, $prenom, $etablissement, $identifiant, $email, $motDePasse) !== false) {
        header("location: ./../../signin.php?error-signup=emptyinput");
        exit();
    }
    if (invalidUid($identifiant) !== false) {
        header("location: ./../../signin.php?error-signup=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ./../../signin.php?error-signup=invalidemail");
        exit();
    }
    if (uidExists($conn, $identifiant, $email) !== false) {
        header("location: ./../../signin.php?error-signup=usernametaken");
        exit();
    }

    // Insertion des données dans la base de données
    $hashedPwd = password_hash($motDePasse, PASSWORD_DEFAULT);

    $ordreSQL_Insert = "INSERT INTO personne (nom, prenom, etablissement, identifiant, email, passwords, status)
                      VALUES('$nom', '$prenom', '$etablissement', '$identifiant', '$email', '$hashedPwd', 'Client')";
    echo $ordreSQL_Insert;
    $res = $conn->exec($ordreSQL_Insert);

    // Création d'un profil de compte


    // Validation
    header("location: ./../../signin.php?error-signup=none");
    exit();

} else {
    header("location: ./../../signin.php");
    exit();
}
?>