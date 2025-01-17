<?php 


try {
    $db = new PDO("mysql:dbname=senresto;host=localhost", "root", "");
} catch (PDOException $e) {
    die("Erreur: ".$e->getMessage());
}


function seConnecter($email, $mdp){
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM users WHERE email =:email AND mdp =:mdp");
        $q->execute([
            "email" => $email,
            "mdp" => $mdp
        ]);

        return $q->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
}

function ajoutUtilisateur($prenom, $nom, $tel, $adresse, $email, $role, $image = "", $mdp = ""){
    global $db;
    try {
        $q = $db->prepare("INSERT INTO users VALUES(null, :prenom, :nom, :tel, :adresse, :email, :mdp, :role, :image)");
        return $q->execute([
            "prenom" => $prenom,
            "nom" => $nom,
            "tel" => $tel,
            "adresse" => $adresse,
            "email" => $email,
            "mdp" => $mdp,
            "role" => $role,
            "image" => $image
        ]);
    } catch (PDOException $e) {
        setToastr($e->getMessage(), "error");
    }
}

function modifierUtilisateur($id, $prenom, $nom, $tel, $adresse, $email, $image){
    global $db;
    try {
        $q = $db->prepare("UPDATE users 
        SET prenom =:prenom, nom =:nom, tel =:tel, adresse =:adresse, email =:email, image =:image
        WHERE id =:id");
        return $q->execute([
            "prenom" => $prenom,
            "nom" => $nom,
            "tel" => $tel,
            "adresse" => $adresse,
            "email" => $email,
            "id" => $id,
            "image" => $image
        ]);
    } catch (PDOException $e) {
        setToastr($e->getMessage(), "error");
    }
}

function supprimerUnUtilisateur($id){
    global $db;
    try {
        $q = $db->prepare("DELETE FROM users WHERE id =:id");
        return $q->execute(["id" => $id]);
    } catch (PDOException $e) {
        setToastr($e->getMessage(), "error");
    }
}

function recupererDesUtilisateurParRole($role = "client"){
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM users WHERE role =:role ORDER BY id DESC");
        $q->execute(["role" => $role]);

        return $q->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        setToastr($e->getMessage(), "error");
    }
}

function recupererUnUtilisateur($id){
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM users WHERE id =:id");
        $q->execute(["id" => $id]);

        return $q->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        setToastr($e->getMessage(), "error");
    }
}

function ajouterUneCategorie($nom, $tag, $image){
    global $db;
    try {
        $q = $db->prepare("INSERT INTO categories VALUES(null, :nom, :tag, :image)");
        return $q->execute([
            "nom" => $nom,
            "tag" => $tag,
            "image" => $image
        ]);
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
}

function listeDesCategories(){
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM categories");
        $q->execute();

        return $q->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
}

function recupererUneCategorie($id){
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM categories WHERE id=:id");
        $q->execute(["id" => $id]);

        return $q->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
}

function modifierUneCategorie($id, $nom, $tag, $image){
    global $db;
    try {
        $q = $db->prepare("UPDATE categories SET nom=:nom, tag=:tag, image=:image
                    WHERE id=:id");
        return $q->execute([
            "nom" => $nom,
            "tag" => $tag,
            "image" => $image,
            "id" => $id
        ]);
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
}

function supprimerUneCategorie($id){
    global $db;
    try {
        $q = $db->prepare("DELETE FROM categories WHERE id=:id");
        return $q->execute([
            "id" => $id
        ]);
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
}

function ajouterUnPlat($nom, $description, $prix, $image, $categorie_id){
    global $db;
    try {
        $q = $db->prepare("INSERT INTO plats VALUES(null, :nom, :description, :prix, :image, :categorie_id)");

        return $q->execute([
            "nom" => $nom,
            "description" => $description,
            "prix" => $prix,
            "image" => $image,
            "categorie_id" => $categorie_id
        ]);
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
}

function listeDesPlats(){
    global $db;
    try{
        $q = $db->prepare("SELECT p.id as id, p.nom as nom, description, prix, p.image as image, c.nom as nomcategorie
                    FROM plats p, categories c
                    WHERE p.categorie_id = c.id
                    ORDER BY id DESC");

        $q->execute([]);
        return $q->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
}

function recupererUnPlat($id){
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM plats WHERE id =:id");
        $q->execute(["id" => $id]);

        return $q->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
}

function modifierUnPlat($id,$nom, $description, $prix, $image, $categorie_id){
    global $db;
    try {
        $q = $db->prepare("UPDATE plats SET nom =:nom, description =:description, prix =:prix, image =:image, categorie_id =:categorie_id
                    WHERE id =:id");
        return $q->execute([
            "nom" => $nom,
            "description" => $description,
            "prix" => $prix,
            "image" => $image,
            "categorie_id" => $categorie_id,
            "id" => $id
        ]);
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
}

function supprimerUnPlat($id){
    global $db;
    try {
        $q = $db->prepare("DELETE FROM plats WHERE id =:id");
        return $q->execute(["id" => $id]);
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
}