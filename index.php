<?php
include './view/header.php';
$controller = isset($_GET["controller"]) ? $_GET["controller"] : "";

if($controller == 'produit'){
    require_once './controller/productController.php';
}elseif($controller == 'categorie'){
    require_once './controller/categorieController.php';
}else{
    require_once './controller/userController.php';
}


if(isset($_GET['action']) && !empty($_GET['action'])){
    if($_GET['action']=='delete'){
        remove();
    }
    if($_GET['action']=='add'){
        create();
    }
    if($_GET['action']=='save'){
        save();
    }
    if($_GET['action']=='edit'){
        edit();
    }
    if($_GET['action']=='update'){
        update();
    }
    
}else{
    index();
}


?>