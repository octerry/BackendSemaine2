<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session privée</title>
</head>
<body>
    <?php 
    
    $user_id = $_SESSION["id"];
    $email = $_SESSION["email"];

    echo "Bonjour !<br>Vous êtes connecté sur votre mail $email<br>Votre identifiant utilisateur est $user_id";
    
    ?>
    <form action="logout.php" method="POST">
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>