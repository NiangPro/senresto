<?php 

$error = "";
if (isset($_POST["login"])) {
    extract($_POST);

    $user = seConnecter($email, $mdp);
    if ($user) {
        $_SESSION["user"] = $user;
        if ($user->role == "admin") {
            header("Location:?page=dashboard");
            exit();
        }else{
            header("Location:?page=profil");
            exit();
        }
    }else{
        $error = "Email ou mot de passe incorrect";
    }
}
require_once("includes/entete.php"); 

require_once("views/connexion.php");

require_once("includes/pied.php"); 
