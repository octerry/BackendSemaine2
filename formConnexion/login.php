<?php

require 'connection.php'; // pour avoir le $pdo

$email = trim( $_POST["email"] );
$password = trim( $_POST["password"] );

// Valider l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Email invalide.";
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = :email');
$stmt->execute(['email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// $user['mot_de_passe'] = password_hash($user['mot_de_passe'],PASSWORD_DEFAULT);

if ($user && password_verify( $password, $user['mot_de_passe'] )){
    session_start();

    $_SESSION["user_id"] = $user["id"];
    $_SESSION["email"] = $user["email"];

    header("location: accueil.php");
} else {
    echo "Email ou mot de passe incorrect";
}

?>