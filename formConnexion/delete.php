<?php 
try {
    require 'connection.php'; // pour le $pdo

    $user_id = $_GET['id'];

    $stmt = $pdo->prepare('DELETE FROM utilisateurs WHERE id = :id');
    $stmt->execute(['id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    echo 'Votre compte a bien été supprimé !';
} catch (PDOException $e) {
    echo 'Erreur lors de la suppression de votre compte :' . $e->getMessage();
}

?>