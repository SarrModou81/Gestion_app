<?php
require_once './model/db.php';

$database = new Database();
$connexion = $database->getConnexion(); // Correctement initialiser $connexion


function getAllC() {
    global $connexion;
    $sql = "SELECT * FROM categories";
    $stmt = $connexion->query($sql);
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $user;
}

function addCategorie($libelle) {
    global $connexion;
    $sql = "INSERT INTO categories (libelle) VALUES (:libelle)";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([
        ':libelle' => $libelle
    ]);
}

function deleteCategorie($id) {
    global $connexion;
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([':id' => $id]);
        echo "Utilisateur supprimé avec succès.";
    
}


function getCategorieById($id) {
    global $connexion;
    $sql = "SELECT * FROM categories WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([':id' => $id]);
    $categorie = $stmt->fetch(PDO::FETCH_ASSOC);  // Utilisation de fetch() pour un seul utilisateur
    return $categorie;
}


function updateCategorie($id, $libelle) {
    global $connexion;
    $sql = "UPDATE categories SET 
                libelle = :libelle
            WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([
        ':id' => $id,
        ':libelle' => $libelle
    ]);
}


?>