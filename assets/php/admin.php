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
}

if ($Status = "Admin") {
    echo '
        <br><br><br><br><br><br>
        <div class="padding container">
            <h2>Administration - Formulaire de saisie de légumes :</h2>
	        <form action="./ajout-legume.php" method="post">
		        <label for="nom">Nom du légume :</label>
		        <input type="text" id="nom" name="nom" required>
		        <label for="saison">Saison de culture :</label>
		        <input type="text" id="saison" name="saison" required>
                <label for="label">Label du légume :</label>
		        <select name="label">
                  <option value="bio">Bio</option>
                  <option value="industriel">Industriel</option>
                </select>
		        <input type="submit" value="Ajouter" name="ajouterLegume">
	        </form>
        </div>
        ';
} else {
    header("location: ./../../index.php");
}
?>