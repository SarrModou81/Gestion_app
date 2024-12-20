<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Liste des Produits</h1>
        <a href="index.php?controller=produit&action=add" class="btn btn-success mb-3">Ajouter un Produit</a>
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Quantite</th>
                    <th>Categorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($produit)) { ?>
                    <?php foreach ($produit as $product) { ?>
                        <tr>
                            <td><?= htmlspecialchars($product['id']) ?></td>
                            <td><?= htmlspecialchars($product['nom']) ?></td>
                            <td><?= htmlspecialchars($product['description']) ?></td>
                            <td><?= htmlspecialchars($product['prix']) ?></td>
                            <td><?= htmlspecialchars($product['quantite']) ?></td>
                            <td><?= htmlspecialchars($product['categorie_libelle']) ?></td>
                            <td>
                                <a href="index.php?controller=produit&action=edit&id=<?= htmlspecialchars($product['id']) ?>" class="btn btn-warning btn-sm">Modifier</a>
                                <a href="index.php?controller=produit&action=delete&id=<?= htmlspecialchars($product['id']) ?>" class="btn btn-danger btn-sm" >Supprimer</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="7" class="text-center">Aucun utilisateur trouvé.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
