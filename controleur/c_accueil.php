<?php
// Fichiers par défaut
require_once './vue/elements/header.php';

// Récupération des annonces :
$lesLocations = getLocations();
$nbCase = 0;

require_once './vue/v_accueil.php';

require_once './vue/elements/footer.php';