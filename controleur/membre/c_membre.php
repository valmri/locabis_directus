<?php
if(estConnecte()) {
    // Fichiers par défaut
    require_once './vue/elements/header.php';
    require_once './vue/membre/v_membre.php';
} else {
    require_once './controleur/c_connexion.php';
}