<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiser</title>
</head>
<body>
    <div>
        <?php 
        
        $id = $_GET["id"];

        $pdo = new PDO('mysql:host=localhost;dbname=catalogue','root','@dm1nITSME');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query("SELECT * FROM catalogue WHERE id=$id");
        $result = $result->fetchAll(PDO::FETCH_DEFAULT);

        $nom = $result[0]["nom"];
        $description = $result[0]["description"];
        $prix = $result[0]["prix"];
        $stock = $result[0]["stock"];

        echo "
        <h2>Actualiser un produit</h2>
        <form method='post'action='update.php'>
            <input type='text' placeholder='Nom' name='nom' value='$nom'>
            <input type='text' placeholder='Description' name='description' value='$description'>
            <input type='number' step='0.01' placeholder='Prix' name='prix' value='$prix'>
            <input type='number' placeholder='Nombre en stock' name='stock' value='$stock'>
            <input type='submit' value='modifier'>
            <input type='hidden' value='$id' name='id'>
        </form>
        ";
        
        ?>
    </div>
</body>
</html>