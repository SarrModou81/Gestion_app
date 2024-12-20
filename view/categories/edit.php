<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Categorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-warning mb-4">Modifier un Categorie</h1>
        <form action="index.php?controller=categorie&action=update&id=<?= $categorie['id'] ?>" method="POST" >
            <div class="mb-3">
                <label for="libelle" class="form-label">Libelle</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="<?= $categorie['libelle'] ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="index.php?controller=categorie" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</body>
</html>
