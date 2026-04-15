<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=catalogue','root','@dm1nITSME');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $stmt = $pdo->prepare('INSERT INTO catalogue (nom, description, prix, stock) VALUES (:nom, :description, :prix, :stock)');
    // $stmt->execute([
    //     "nom" => "Clair Obscur : Expedition 33",
    //     "description" => "GOTY",
    //     "prix" => 23.99,
    //     "stock" => 1200
    // ]);

    $result = $pdo->query("SELECT * FROM catalogue");
    $result = $result->fetchAll(PDO::FETCH_ASSOC);

    echo "<ul>";
    foreach ($result as $row) {
        echo "<li><strong>". $row["nom"] . "</strong> " . $row['prix'] . ' €<br>"' . $row["description"] . '"<br>' . $row["stock"] . " restants en stock</li>";
        echo '<a href="delete.php?id=' . $row["id"] . '">Supprimer</a> <a href="editProduct.php?id=' . $row["id"] . '">Modifier</a><br>';
    }
    echo "</ul>";
} catch (PDOException $e) {
    echo 'Erreur : '. $e->getMessage();
}

?>