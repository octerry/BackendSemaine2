<?php

try {

    $pdo = new PDO('mysql:host=localhost;dbname=catalogue','root','My@dm1nLilly');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_POST['nom'] != ''){
        $stmt = $pdo->prepare('UPDATE catalogue SET nom = :nom WHERE id = :id');
        $stmt->execute([
            "id" => $_POST["id"],
            "nom" => $_POST["nom"],
        ]);
    }
    if ($_POST['description'] != ''){
        $stmt = $pdo->prepare('UPDATE catalogue SET description = :description WHERE id = :id');
        $stmt->execute([
            "id" => $_POST["id"],
            "description" => $_POST["description"],
        ]);
    }
    if ($_POST['prix'] != ''){
        $stmt = $pdo->prepare('UPDATE catalogue SET prix = :prix WHERE id = :id');
        $stmt->execute([
            "id" => $_POST["id"],
            "prix" => $_POST["prix"],
        ]);
    }
    if ($_POST['stock'] != ''){
        $stmt = $pdo->prepare('UPDATE catalogue SET stock = :stock WHERE id = :id');
        $stmt->execute([
            "id" => $_POST["id"],
            "stock" => $_POST["stock"],
        ]);
    }
    
    header("location: index.php");
} catch (PDOException $e) {
    echo 'Erreur : '. $e->getMessage();
}

?>