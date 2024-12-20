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
        <form action="index.php?controller=user&action=update&id=<?= $user['id'] ?>" method="POST">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $user['nom'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $user['prenom'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="mot_de_passe" class="form-label">Nouveau mot de passe (Laisser vide pour ne pas changer)</label>
                <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="index.php?controller=user" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</body>
</html>
