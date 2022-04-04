<?php 
// Fichiers par défaut
require_once './vue/elements/header.php';

// Récupération des données

if(
    isset($_POST['identifiant']) &&
    isset($_POST['motDePasse']) &&
    !empty($_POST['identifiant']) &&
    !empty($_POST['motDePasse'])
) {

    // Nettoyage des données
    $identifiant = filter_input(INPUT_POST, 'identifiant', FILTER_SANITIZE_STRING);
    $motDePasse = filter_input(INPUT_POST, 'motDePasse', FILTER_SANITIZE_STRING);

    $autorisationConnexion = connexion($identifiant, $motDePasse);

    if($autorisationConnexion) {

        session_start();
        $_SESSION['identifiant'] = $identifiant;
        $_SESSION['motDePasse'] = $motDePasse;
        $_SESSION['jeton'] = bin2hex(openssl_random_pseudo_bytes(6));
        
        header('Location:?page=reservation');

    } else {
        $msgErreur = "Identifant ou mot de passe incorrect !";
    }

}

if(!estConnecte()) {
    require_once './vue/v_connexion.php';
}

require_once './vue/elements/footer.php';