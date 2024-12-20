<?php
require_once './model/db.php';

$database = new Database();
$connexion = $database->getConnexion(); // Correctement initialiser $connexion


function getAll() {
    global $connexion;
    $sql = "SELECT * FROM users";
    $stmt = $connexion->query($sql);
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $user;
}

function addUsers($nom, $prenom, $email, $mot_de_passe) {
    global $connexion;
    $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':mot_de_passe' => $hashed_password
    ]);
}

function deleteUsers($id) {
    global $connexion;
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([':id' => $id]);
        echo "Utilisateur supprimé avec succès.";
    
}


function getUserById($id) {
    global $connexion;
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([':id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);  // Utilisation de fetch() pour un seul utilisateur
    return $user;
}


function updateUsers($id, $nom, $prenom, $email, $mot_de_passe) {
    global $connexion;
    $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET 
                nom = :nom,
                prenom = :prenom,
                email = :email,
                mot_de_passe = :mot_de_passe
            WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([
        ':id' => $id,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':mot_de_passe' => $hashed_password
    ]);
}
