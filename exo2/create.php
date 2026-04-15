<?php

try {

    $pdo = new PDO('mysql:host=localhost;dbname=catalogue','root','@dm1nITSME');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('INSERT INTO catalogue (nom, description, prix, stock) VALUES (:nom, :description, :prix, :stock)');
    $stmt->execute([
        "nom" => $_POST["nom"],
        "description" => $_POST["description"],
        "prix" => $_POST["prix"],
        "stock" => $_POST["stock"]
    ]);
    
    header("location: index.php");
} catch (PDOException $e) {
    echo 'Erreur : '. $e->getMessage();
}

?>