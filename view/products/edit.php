<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-warning mb-4">Modifier un Utilisateur</h1>
        <form action="index.php?controller=produit&action=update&id=<?= $produit['id'] ?>" method="POST">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $produit['nom'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= $produit['description'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" value="<?= $produit['prix'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="quantite" class="form-label">Quantite</label>
                <input type="number" class="form-control" id="quantite" name="quantite" value="<?= $produit['quantite'] ?>" required>
            </div>
            <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <select name="id_categorie" class="form-control" required>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category['id'] ?>" <?= $produit['id_categorie'] == $category['id'] ? 'selected' : '' ?>>
                        <?= $category['libelle'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="index.php?controller=produit" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</body>
</html>
