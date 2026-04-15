<?php

require 'connection.php'; // pour avoir le $pdo

$email = trim( $_POST["email"] );
$password = trim( $_POST["password"] );

// Valider l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Email invalide.";
    exit;
}

$stmt = $pdo->prepare('SELECT COUNT(*) FROM utilisateurs WHERE email = :email');
$stmt->execute(['email' => $email]);
$n_account = $stmt->fetch(PDO::FETCH_NUM);

if ($n_account[0] <= 0) {
    $stmt = $pdo->prepare('INSERT INTO utilisateurs (email, mot_de_passe) VALUES (:email, :password)');
    $stmt->execute([
        'email'=> $email,
        'password'=> password_hash($password, PASSWORD_DEFAULT)
    ]);

    echo 'Votre compte a été créé !';
} else {
    echo 'Un compte avec ce mail existe déjà :/';
}
?>