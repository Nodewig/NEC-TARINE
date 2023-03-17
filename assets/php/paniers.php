<?php
session_start();
if (isset($_SESSION["useruid"])) {
    include_once("./../modules/header_php.php");
    require_once("./connexion.php");

    $sql = "SELECT * FROM personne WHERE identifiant = '" . $_SESSION["useruid"] . "'";

    // Récupération des données de la base de données

    $resSQL = $conn->query($sql);
    $leTuple = $resSQL->fetch(PDO::FETCH_ASSOC);

    $Nom = $leTuple["nom"];
    $Prénom = $leTuple["prenom"];
    $établissement = $leTuple["etablissement"];
    $Identifiant = $leTuple["identifiant"];
    $Email = $leTuple["email"];
    $MotDePasse = $leTuple["passwords"];
    $Status = $leTuple["status"];
} else {
    header("location: ./../../signin.php?error=no-connect");
}
?>