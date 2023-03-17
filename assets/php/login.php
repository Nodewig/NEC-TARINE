<?php

if (isset($_POST["cmdValiderLogin"])) {
    // Récupération des données de formulaire
    $identifiant = $_REQUEST["id"];
    $email = $_REQUEST["id"];
    $motDePasse = $_REQUEST["pwd"];

    // Connexion à la base
    require_once ("./connexion.php");
    require_once ("./function.php");

    // Checks
    if (emptyInputLogin($identifiant, $motDePasse) !== false) {
        header("location: ./../../signin.php?error-signin=emptyinput");
        exit();
    }

    loginUser($conn, $identifiant, $motDePasse);

} else if (isset($_POST["cmdValiderLoginPanier"])){
    // Récupération des données de formulaire
    $identifiant = $_REQUEST["id"];
    $email = $_REQUEST["id"];
    $motDePasse = $_REQUEST["pwd"];

    // Connexion à la base
    require_once ("./connexion.php");
    require_once ("./function.php");

    // Checks
    if (emptyInputLogin($identifiant, $motDePasse) !== false) {
        header("location: ./../../signin.php?error-signin=emptyinput&error=no-connect");
        exit();
    }

    loginUserPanier($conn, $identifiant, $motDePasse);
} else {
    header("location: ./../../signin.php");
    exit();
}

?>