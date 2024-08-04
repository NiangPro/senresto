<?php


if(isset($_POST["ajouter"])){
    extract($_POST);

    $img = $_FILES["image"]["tmp_name"];
    $img_name = uniqid().".jpg";

    if (ajoutUtilisateur(ucfirst($prenom), ucfirst($nom), $tel, $adresse, $email, "chef", $img_name)) {
        move_uploaded_file($img, "images/".$img_name);

        setToastr("Ajout chef avec succès");
        header("Location: ?page=chefs");
        exit();
    }else{
        setToastr("Erreur d'ajout chef", "error");
    }
}

if(isset($_POST["modifier"])){
    extract($_POST);

    $c = recupererUnUtilisateur($_GET["id"]);
    if ($_FILES["image"]["size"] != 0) {
        $img = $_FILES["image"]["tmp_name"];
        $img_name = uniqid().".jpg";
    }else{
        $img_name = $c->image;
    }

    if (modifierUtilisateur($c->id, ucfirst($prenom), ucfirst($nom), $tel, $adresse, $email, $img_name)) {
        move_uploaded_file($img, "images/".$img_name);

        setToastr("Edition chef avec succès");
        header("Location: ?page=chefs");
        exit();
    }else{
        setToastr("Erreur d'edition chef", "error");
    }
}

if (isset($_GET["idDeleting"])) {
    if (supprimerUnUtilisateur($_GET["idDeleting"])) {
        setToastr("Suppression avec succès");
        header("Location: ?page=chefs");
    }
}

$chefs = recupererDesUtilisateurParRole("chef");
require_once("includes/header.php");

if (isset($_GET["type"])) {
    if (isset($_GET["id"])) {
        $c = recupererUnUtilisateur($_GET["id"]);
    }
    require_once("views/addChefs.php");
}else{
    require_once("views/chefs.php");
}

require_once("includes/footer.php");