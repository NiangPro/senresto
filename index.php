<?php 

session_start();
require_once("models/database.php"); 
require_once("includes/mesfonctions.php");

if(isset($_GET["page"])){
    switch ($_GET["page"]) {
        case 'dashboard':
            require_once("controllers/dashboardController.php");
            break;
        case 'menu':
            require_once("controllers/menuController.php");
            break;
        case 'category':
            require_once("controllers/categoryController.php");
            break;
        case 'plats':
            require_once("controllers/platController.php");
            break;
        case 'connexion':
            require_once("controllers/connexionController.php");
            break;
        case 'deconnexion':
                require_once("controllers/deconnexionController.php");
                break;
        case 'profil':
                require_once("controllers/profilController.php");
                break;
        
        default:
            require_once("controllers/homeController.php"); 

            break;
    }
}else{

    require_once("controllers/homeController.php"); 
}


