<?php

function controleur(string $page) {

    // Définition du tableau des directions
    $actions = array();
    $actions['accueil'] = 'c_accueil.php';
    $actions['connexion'] = 'c_connexion.php';
    $actions['membre'] = 'membre/c_membre.php';
    $actions['deconnexion'] = 'membre/c_deconnexion.php';

    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
        $actions['location'] = 'c_location.php';
        $actions['reserver'] = 'membre/c_reservation.php';
    }
    
    
    if(array_key_exists($page, $actions)) {

        $resultat = $actions[$page];

    } else {

        $resultat = $actions['accueil'];

    }

    return $resultat;

}
