<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Catalogue</h1>
    <div>
        <h2>Ajouter un produit</h2>
        <form method="POST" action="create.php">
            <input type="text" placeholder="Nom" name="nom">
            <input type="text" placeholder="Description" name="description">
            <input type="number" step="0.01" placeholder="Prix" name="prix">
            <input type="number" placeholder="Nombre en stock" name="stock">
            <input type="submit" value="ajouter">
        </form>
    </div>
    <h2>Voir les produits en stock</h2>
    <?php include('show.php') ?>
</body>
</html>