<?php 


if (isset($_POST["ajouter"])) {
    extract($_POST);

    $img = $_FILES["image"]["tmp_name"];
    $img_name = uniqid().".jpg";

    if (ajouterUnPlat($nom, $description, $prix, $img_name, $categorie_id)) {
        move_uploaded_file($img, "images/".$img_name);

        $_SESSION['toastr'] = [
            'type' => 'success',
            'message' => 'Ajout plat avec succès!'
        ];

        header("Location:?page=plats");
        exit();
    }
}

if (isset($_POST["modifier"])) {
    extract($_POST);

    $plat = recupererUnPlat($_GET["id"]);

    // recuperation de l'image du produit 
    if ($_FILES["image"]["size"] != 0) {
        $img = $_FILES["image"]["tmp_name"];
        $img_name = uniqid().".jpg";
        move_uploaded_file($img, "images/".$img_name);
    }else{
        $img_name = $plat->image;
    }

    if (modifierUnPlat($plat->id, $nom, $description, $prix, $img_name, $categorie_id)) {
        header("Location:?page=plats");
        exit();
    }
}

if (isset($_GET["idDeleting"])) {
    supprimerUnPlat($_GET["idDeleting"]);

    header("Location:?page=plats");
    exit();
}

$plats = listeDesPlats();

$cats = listeDesCategories();

require_once("includes/header.php");

if (isset($_GET["type"])) {
    if (isset($_GET["id"])) {
        $p = recupererUnPlat($_GET["id"]);
    }
    require_once("views/addPlat.php");
}else{
    require_once("views/plat.php");
}

require_once("includes/footer.php");