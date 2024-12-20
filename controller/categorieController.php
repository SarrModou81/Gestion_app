<?php
require_once './model/categorieModel.php';

function index(){
    $categorie = getAllC();
    require_once './view/categories/list.php';
}

function remove(){
    $id =$_GET['id'];
    deleteCategorie($id);
    header('location:index.php?controller=categorie');

}
function create(){
    require_once './view/categories/add.php';
}

function edit(){
    $id =$_GET['id'];
    $categorie = getCategorieById($id);
     require_once './view/categories/edit.php';
}

function save() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $libelle = $_POST['libelle'] ?? '';
       

        // Appeler la bonne fonction
        addCategorie($libelle);

        // Redirection après ajout
        header('Location: index.php?controller=categorie');
        exit();
    } 
}




function update() {
    // Vérification si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupération des données du formulaire
        $id = $_GET['id']; // Récupération de l'ID de l'utilisateur à partir de l'URL
        $libelle = $_POST['libelle'];
       
       
        // Appel de la fonction updateCategorie pour mettre à jour l'utilisateur dans la base de données
        updateCategorie($id, $libelle);

        // Redirection après la mise à jour
        header('Location: index.php?controller=categorie');
        exit(); // Toujours utiliser exit() après une redirection pour arrêter l'exécution du script
    }
}

?>