<?php
// Fichiers par défaut
require_once './vue/elements/header.php';

if(
    isset($_GET['id']) &&
    !empty($_GET['id']) &&
    is_numeric($_GET['id'])
) {

    $idLocation = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Récupération des informations de la location
    $resultat = getLocationById($idLocation);
    $laLocation = $resultat->data[0];
    
    require_once './vue/v_location.php';

} else {
    require_once './vue/v_accueil.php';
}


require_once './vue/elements/footer.php';