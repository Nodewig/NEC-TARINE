<?php

ini_set("SMTP","smtp.univ-pau.fr");
ini_set("smtp_port","25");


$nom = $_POST['nom'];
$email = $_POST['email'];
$sujet = $_POST['sujet'];
$message = $_POST['message'];

$to = 'scolaireromain@gmail.com';
$headers = "From: $email" . "\r\n" .
           "Reply-To: $email" . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

$message = "Nom : $nom\n" .
           "Adresse e-mail : $email\n" .
           "Sujet : $sujet\n\n" .
           "Message :\n$message";

mail($to, $sujet, $message, $headers);

if(function_exists('mail')) {
    echo '<h1>Existe</h1>';
} else {
    echo '<h1>Existe pas</h1>';
}

/*
if (mail($to, $sujet, $message, $headers)) {
    echo "L'e-mail a été envoyé avec succès.";
    header("location: ./../../contacts.php?mail=envoye");
} else {
    echo "Une erreur s'est produite lors de l'envoi de l'e-mail.";
    header("location: ./../../contacts.php?mail=erreur");
}
*/
?>