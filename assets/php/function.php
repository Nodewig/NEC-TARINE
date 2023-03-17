<?php

function emptyInputSignup($nom, $prenom, $etablissement, $identifiant, $email, $motDePasse) {
    $result;
    if (empty($nom) || empty($prenom) || empty($etablissement) || empty($identifiant) || empty($email) || empty($motDePasse)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidUid($identifiant) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $identifiant)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}


function uidExists($conn, $identifiant, $email) {
    $sql = "SELECT * FROM personne WHERE identifiant = '$identifiant' OR email = '$email';";

    $nb = $conn->query($sql);
    $resSQL = $nb->fetch(PDO::FETCH_ASSOC);
    
    if($resSQL==NULL){
        $result = false;
    } else {
        $result = $resSQL;
    }

    return $result;
    
}


function emptyInputLogin($identifiant, $motDePasse) {
    $result;
    if (empty($identifiant) || empty($motDePasse)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function loginUser($conn, $identifiant, $motDePasse) {
    $uidExists = uidExists($conn, $identifiant, $identifiant);

    if ($uidExists === false) {
        header("location: ./../../signin.php?error-signin=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["passwords"];
    $checkPwd = password_verify($motDePasse, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ./../../signin.php?error-signin=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["userId"];
        $_SESSION["useruid"] = $uidExists["identifiant"];
        header("location: ./../../index.php");
        exit();
    }
}

function loginUserPanier($conn, $identifiant, $motDePasse) {
    $uidExists = uidExists($conn, $identifiant, $identifiant);

    if ($uidExists === false) {
        header("location: ./../../signin.php?error-signin=wronglogin&error=no-connect");
        exit();
    }

    $pwdHashed = $uidExists["passwords"];
    $checkPwd = password_verify($motDePasse, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ./../../signin.php?error-signin=wronglogin&error=no-connect");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["userId"];
        $_SESSION["useruid"] = $uidExists["identifiant"];
        header("location: ./paniers.php");
        exit();
    }
}