<?php 

if (isset($_POST["ajouter"])) {
    extract($_POST);

    $img = $_FILES["image"]["tmp_name"];

    $img_name = uniqid().".jpg";

    if (ajouterUneCategorie($nom, $tag, $img_name)) {
        move_uploaded_file($img, "images/".$img_name);
        header("Location:?page=category");
        exit();
    }

}

if (isset($_POST["modifier"])) {
    extract($_POST);

    $c = recupererUneCategorie($_GET["id"]);
    if($_FILES["image"]["size"] != 0){
        $img = $_FILES["image"]["tmp_name"];
        $img_name = uniqid().".jpg";
        move_uploaded_file($img, "images/".$img_name);
    }else{
        $img_name = $c->image;
    }

    if (modifierUneCategorie($_GET["id"], $nom, $tag, $img_name)) {
        header("location:?page=category");
        exit();
    }
}

if (isset($_GET["idDeleting"])) {
    supprimerUneCategorie($_GET["idDeleting"]);
    header("location:?page=category");
    exit();
}


$cats = listeDesCategories();

require_once("includes/header.php");

if (isset($_GET["type"])) {
    if (isset($_GET["id"])) {
        $c = recupererUneCategorie($_GET["id"]);
    }
    require_once("views/addCategory.php");

}else{
    require_once("views/category.php");

}

require_once("includes/footer.php");