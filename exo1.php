<?php 

try {
    $pdo = new PDO('mysql:host=localhost;dbname=livres','root','My@dm1nLilly');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // $stmt = $pdo->prepare("INSERT INTO livres (titre, auteur, annee_publication, disponible) VALUES (:titre, :auteur, :annee_publication, :disponible)");

    // $stmt->execute([
    //     "titre" => "Une histoire",
    //     "auteur" => "J'ai plus d'inspi",
    //     "annee_publication" => "1934",
    //     "disponible" => 0
    // ]);
    
    $update = $pdo->prepare('UPDATE livres SET disponible = :disponible WHERE id = :id');
    $update->execute([
        "disponible" => 0,
        "id" => 2,
    ]);

    // $result = $pdo->query("SELECT * FROM livres");
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE annee_publication > :annee");
    $stmt->execute([
        "annee" => "2000"
    ]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Disponibilité des livres</h2>";

    foreach ($result as $row) {
        $disponibilite = $row["disponible"] ? "disponible ✅" : "indisponible ❌";
        echo '<strong>"' . $row['titre'] . '"</strong> '  . $row['annee_publication'] . ' - '. $row['auteur'] . " (" . $disponibilite . ")<br>";
    }
}
catch (PDOException $e) {
    echo "Erreur : ". $e->getMessage();
}

?>