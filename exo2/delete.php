<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=catalogue','root','@dm1nITSME');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('DELETE FROM catalogue WHERE id = :id');
    $stmt->execute([
        "id" => $_GET["id"]
    ]);
    
    header("location: index.php");
} catch (PDOException $e) {
    echo 'Erreur : '. $e->getMessage();
}

?>