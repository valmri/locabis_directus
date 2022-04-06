<?php
// Fichiers par défaut
require_once './vue/elements/header.php';

// Récupération numero page
if(isset($_GET['n']) && !empty($_GET['n']) && is_numeric($_GET['n'])) {
    $pageCourante = $_GET['n'];
} else {
    $pageCourante = 1;
}

// Système de pagination
// Connaitre le nombre d'appart
$nbLocations = getNombreLocations();

// Définition du nombre de page
$locationParPage = 6;
$pages = ceil($nbLocations->total_count/$locationParPage);

// Calcul première page
$premierePage = ($pageCourante * $locationParPage) - $locationParPage;

// Récupération des locations
$afficheLocation = getPage($premierePage, $locationParPage);
$nbCase = 0;

require_once './vue/v_accueil.php';

require_once './vue/elements/footer.php';