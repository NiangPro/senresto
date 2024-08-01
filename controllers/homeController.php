<?php 

$cats = listeDesCategories();
$plats = listeDesPlats();

require_once("includes/entete.php"); 

require_once("views/home.php");

require_once("includes/pied.php"); 
