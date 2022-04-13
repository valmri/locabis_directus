<?php
if(estConnecte()) {
    // Fichiers par défaut
    require_once './vue/elements/header.php';

    if(
        isset($_GET['id']) &&
        !empty($_GET['id']) &&
        is_numeric($_GET['id'])
    ) {
    
        // Récupération des données
        $idLocation = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $idUtilisateur = $_SESSION['id'];
    
        // Récupération des informations de la location
        $laLocation = getLocationById($idLocation);

        if(
            isset($_POST['dateDebut']) &&
            isset($_POST['dateFin']) &&
            isset($_POST['heureDebut']) &&
            isset($_POST['heureFin']) &&
            !empty($_POST['dateDebut']) &&
            !empty($_POST['dateFin']) &&
            !empty($_POST['heureDebut']) &&
            !empty($_POST['heureFin'])
        ) {

            // Nettoyage des données
            $dateDebut = filter_input(INPUT_POST, 'dateDebut', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateFin = filter_input(INPUT_POST, 'dateFin', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $heureDebut = filter_input(INPUT_POST, 'heureDebut', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $heureFin = filter_input(INPUT_POST, 'heureFin', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Création du tableau de données
            $donnees = array(
                "utilisateur" => $idUtilisateur,
                "appartement" => $idLocation,
                "date_debut" => $dateDebut.'T'.$heureDebut.':00',
                "date_fin" => $dateFin.'T'.$heureFin.':00'
            );

            try {
                add("reservaion", $donnees);
                $msgInfo = "Réservation effectuée avec succès !";
            } catch (Exception $e) {
                $msgErreur = "Erreur lors de la réservation.";
            }

        }

        if($laLocation) {
            require_once './vue/membre/v_reservation.php';
        } else {
            $titreErreur = "Location innexistante !";
            $msgErreur = "La location recherché est innexistante ou a été retiré.";
            require_once './vue/elements/erreur.php';
        }
    
    } else {
        require_once './vue/v_accueil.php';
    }

} else {
    require_once './controleur/c_connexion.php';
}