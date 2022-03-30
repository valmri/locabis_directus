<?php

function controleur(string $page) {

    // Définition du tableau des directions
    $actions = array();
    $actions['accueil'] = 'c_accueil.php';
    $actions['connexion'] = 'c_connexion.php';
    
    if(array_key_exists($page, $actions)) {

        $resultat = $actions[$page];

    } else {

        $resultat = $actions['accueil'];

    }

    return $resultat;

}
