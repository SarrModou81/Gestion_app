<?php
require_once './model/productModel.php';
require_once './model/categorieModel.php';


function index(){
    $produit = getAll();
    require_once './view/products/list.php';
}

function remove(){
    $id =$_GET['id'];
    deleteProduit($id);
    header('location:index.php?controller=produit');

}
function create(){
    $categories = getAllC();
    require_once './view/products/add.php';
}

function edit(){
    $id =$_GET['id'];
    $produit = getProduitById($id);
    $categories = getAllC();
     require_once './view/products/edit.php';
}

function save() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $description = $_POST['description'] ?? '';
        $prix = $_POST['prix'] ?? '';
        $quantite = $_POST['quantite'] ?? '';
        $id_categorie = $_POST['id_categorie'] ?? '';
       

        // Appeler la bonne fonction
        addProduit($nom,$description,$prix,$quantite,$id_categorie);

        // Redirection après ajout
        header('Location: index.php?controller=produit');
        exit();
    } 
}




function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $quantite = $_POST['quantite'];
        $id_categorie = $_POST['id_categorie'];

        

        // Appel à la fonction de mise à jour
        updateProduit($id, $nom, $description, $prix, $quantite, $id_categorie);

        // Redirection après la mise à jour
        header('Location: index.php?controller=produit');
        exit();
    }
}



?>