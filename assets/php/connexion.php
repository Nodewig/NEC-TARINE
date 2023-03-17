<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "nec-tarine";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
}

?>