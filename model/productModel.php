<?php
require_once './model/db.php';

$database = new Database();
$connexion = $database->getConnexion(); // Correctement initialiser $connexion


function getAll() {
    global $connexion;
    $sql = "SELECT products.*, categories.libelle AS categorie_libelle FROM products INNER JOIN categories ON products.id_categorie = categories.id";
    $stmt = $connexion->query($sql);
    $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $produit;
}

function addProduit($nom, $description, $prix, $quantite,$id_categorie) {
    global $connexion;
    $sql = "INSERT INTO products (nom, description, prix, quantite,id_categorie) VALUES (:nom, :description, :prix, :quantite, :id_categorie)";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([
        ':nom' => $nom,
        ':description' => $description,
        ':prix' => $prix,
        ':quantite' => $quantite,
        ':id_categorie' => $id_categorie
    ]);
}

function deleteProduit($id) {
    global $connexion;
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([':id' => $id]);
        echo "Produit supprimé avec succès.";
    
}


function getProduitById($id) {
    global $connexion;
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([':id' => $id]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);  // Utilisation de fetch() pour un seul utilisateur
    return $produit;
}


function updateProduit($id, $nom, $description, $prix, $quantite, $id_categorie) {
    global $connexion;

    // Vérification si id_categorie est vide ou non numérique
    if (empty($id_categorie) || !is_numeric($id_categorie)) {
        $id_categorie = null; // Attribuer NULL si la catégorie est vide ou invalide
    }

    $sql = "UPDATE products SET 
                nom = :nom,
                description = :description,
                prix = :prix,
                quantite = :quantite,
                id_categorie = :id_categorie
            WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([
        ':id' => $id,
        ':nom' => $nom,
        ':description' => $description,
        ':prix' => $prix,
        ':quantite' => $quantite,
        ':id_categorie' => $id_categorie
    ]);
}
