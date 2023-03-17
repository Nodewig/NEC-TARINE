<?php

if (isset($_POST["cmdValiderCreateAccount"])) {
    // Récupération des données de formulaire
    $nom = $_REQUEST["txtNom"];
    $prenom = $_REQUEST["txtPrenom"];
    $etablissement = $_REQUEST["txtEtablissement"];
    $identifiant = $_REQUEST["txtId"];
    $email = $_REQUEST["txtEmail"];
    $motDePasse = $_REQUEST["txtPassword"];

    require_once ("./connexion.php");
    require_once ("./function.php");

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

    $ordreSQL_Insert="INSERT INTO personne (nom, prenom, etablissement, identifiant, email, passwords, status)
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
