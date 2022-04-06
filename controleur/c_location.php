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
    $laLocation = getLocationById($idLocation);

    if($laLocation) {
        require_once './vue/v_location.php';
    } else {
        $titreErreur = "Location innexistante !";
        $msgErreur = "La location recherché est innexistante ou a été retiré.";
        require_once './vue/elements/erreur.php';
    }
    

} else {
    require_once './vue/v_accueil.php';
}


require_once './vue/elements/footer.php';