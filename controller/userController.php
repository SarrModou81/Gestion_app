<?php
require_once './model/userModel.php';

function index(){
    $users = getAll();
    require_once './view/users/list.php';
}

function remove(){
    $id =$_GET['id'];
    deleteUsers($id);
    header('location:index.php?controller=user');

}
function create(){
    require_once './view/users/add.php';
}

function edit(){
    $id =$_GET['id'];
    $user = getUserById($id);
     require_once './view/users/edit.php';
}

function save() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $mot_de_passe = $_POST['mot_de_passe'] ?? '';

        // Appeler la bonne fonction
        addUsers($nom, $prenom, $email, $mot_de_passe);

        // Redirection après ajout
        header('Location: index.php?controller=user');
        exit();
    } 
}




function update() {
    // Vérification si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupération des données du formulaire
        $id = $_GET['id']; // Récupération de l'ID de l'utilisateur à partir de l'URL
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];
        // Si le mot de passe est vide, on ne le met pas à jour
        if (empty($mot_de_passe)) {
            // Utilisation d'un mot de passe existant ou autre logique selon besoin
            $mot_de_passe = null;
        } else {
            // Sinon, on hash le nouveau mot de passe
            $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        }

        // Appel de la fonction updateUsers pour mettre à jour l'utilisateur dans la base de données
        updateUsers($id, $nom, $prenom, $email, $mot_de_passe);

        // Redirection après la mise à jour
        header('Location: index.php?controller=user');
        exit(); // Toujours utiliser exit() après une redirection pour arrêter l'exécution du script
    }
}

?>