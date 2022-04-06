<?php
if(estConnecte()) {
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
            require_once './vue/membre/v_reservation.php';
        } else {
            $titreErreur = "Location innexistante !";
            $msgErreur = "La location recherché est innexistante ou a été retiré.";
            require_once './vue/elements/erreur.php';
        }

        // Récupération des dates
        var_dump($_POST);

        if(
            isset($_POST['dateDebut']) &&
            isset($_POST['dateFin']) &&
            !empty($_POST['dateDebut']) &&
            !empty($_POST['dateFin'])
        ) {

            // Nettoyage des données
            $dateDebut = filter_input(INPUT_POST, 'dateDebut', FILTER_SANITIZE_STRING);
            $dateFin = filter_input(INPUT_POST, 'dateFin', FILTER_SANITIZE_STRING);

            

        }
        
    
    } else {
        require_once './vue/v_accueil.php';
    }

} else {
    require_once './controleur/c_connexion.php';
}