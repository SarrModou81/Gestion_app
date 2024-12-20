<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Liste des Categories</h1>
        <a href="index.php?controller=categorie&action=add" class="btn btn-success mb-3">Ajouter un Categories</a>
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Libelle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categorie)) { ?>
                    <?php foreach ($categorie as $categories) { ?>
                        <tr>
                            <td><?= htmlspecialchars($categories['id']) ?></td>
                            <td><?= htmlspecialchars($categories['libelle']) ?></td>
                            
                            <td>
                                <a href="index.php?controller=categorie&action=edit&id=<?= htmlspecialchars($categories['id']) ?>" class="btn btn-warning btn-sm">Modifier</a>
                                <a href="index.php?controller=categorie&action=delete&id=<?= htmlspecialchars($categories['id']) ?>" class="btn btn-danger btn-sm" >Supprimer</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="3" class="text-center">Aucun Categories trouvé.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
