<?php

function connexion(string $identifiant, string $motDePasse) {

    $resultat = false;
    $infosUtilisateur = requete("http://172.24.2.143:8055/items/utilisateur?fields=identifiant,motDePasse&[filter][identifiant][_eq]=".$identifiant);

    if(!empty($infosUtilisateur->data)) {

        $identifiantUtilisateur = $infosUtilisateur->data[0]->identifiant;
        $mdpUtilisateur = $infosUtilisateur->data[0]->motDePasse;

        if ($identifiant ===  $identifiantUtilisateur && password_verify($motDePasse, $mdpUtilisateur)) {

            $resultat = true;
    
        }

    }

    return $resultat;

}

function estConnecte() {

    $resultat = false;

    if (
        isset($_SESSION['identifiant']) &&
        isset($_SESSION['motDePasse']) &&
        isset($_SESSION['jeton'])
    ) {

        $identifiant = $_SESSION['identifiant'];
        $motDePasse = $_SESSION['motDePasse'];
    
        $infosUtilisateur = requete("http://172.24.2.143:8055/items/utilisateur?fields=identifiant,motDePasse&[filter][identifiant][_eq]=".$identifiant);

        if(!empty($infosUtilisateur->data)) {

            $identifiantUtilisateur = $infosUtilisateur->data[0]->identifiant;
            $mdpUtilisateur = $infosUtilisateur->data[0]->motDePasse;

            if ($identifiant ===  $identifiantUtilisateur && password_verify($motDePasse, $mdpUtilisateur)) {

                $resultat = true;
        
            }
        }

    }

    return $resultat;

}

function getInfosUtilisateur(string $identifiant) {

    $resultat = false;
    
    $infosUtilisateur = requete("http://172.24.2.143:8055/items/utilisateur?fields=identifiant,prenom,nom,derniere_connexion&[filter][identifiant][_eq]=".$identifiant);

    if(!empty($infosUtilisateur->data)) {

        $resultat = $infosUtilisateur->data[0];

    }

    return $resultat;

}