<?php
session_start();
if (isset($_SESSION["useruid"])) {
    include_once("./../modules/header_profile.php");
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
?>

<br><br><br><br><br><br><br>

<div class="padding container">
    <div class="col-md-8">
        <!-- Column -->
        <div class="card">
            <img class="card-img-top" src="https://i.imgur.com/K7A78We.jpg" alt="Card image cap">
            <div class="card-body little-profile text-center">
                <div class="pro-img"><img src="./../images/icon-profil.png" alt="user"></div>
                <h3 class="m-b-0">
                    <?php echo '<h1>' . $Identifiant . '</h1>'; ?>
                </h3>
                <h3>🟢En Ligne</h3>
                <p>Full Stack Developer</p>

                <?php
                if ($Status == "Admin") {
                    echo '<a href="./admin.php" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Le Côté Admin</a>';
                }
                ?>

                <a href="#" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded"
                    data-abc="true">Modifier Le Profil</a>
                <div class="row text-center m-t-20">
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">280</h3><small>Articles</small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">24</h3><small>Paniers</small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">
                            <?php echo $Status ?>
                        </h3><small>Status</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="./../js/vanilla-tilt.js"></script>
<script type="text/javascript">
    VanillaTilt.init(document.querySelector(".card"), {
        reverse: false,
        max: 3,
        speed: 2500,
    });
    VanillaTilt.init(document.querySelector(".padding"), {
        reverse: false,
        max: 3,
        speed: 2500,
    });

</script>
<br><br><br>