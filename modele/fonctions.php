<?php

function requete(string $maRequete) {

    $curl = curl_init();

    curl_setopt_array($curl, [
    CURLOPT_PORT => "8055",
    CURLOPT_URL => $maRequete,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    $resultat = "cURL Error #:" . $err;
    } else {
    $resultat = $response;
    }

    return json_decode($resultat);

}

function getLocations() {
    $recherche = "http://172.24.2.143:8055/items/appartement?fields=id,image,idtype.libtype,idimm.ville";
    return requete($recherche);
}

function getLocationById(int $idLocation) {
    $recherche = "http://172.24.2.143:8055/items/appartement?fields=id,image,descriptif,idimm.adimm,idimm.ville,idimm.ascensseur,idtype.libtype,idtype.tariflocbase&[filter][id][_eq]=".$idLocation;
    $reponse = requete($recherche);

    if(!empty($reponse->data)) {
        $resultat = $reponse->data[0];
    } else {
        $resultat = false;
    }

    return $resultat;
}

function getNombreLocations() {
    $recherche = "http://172.24.2.143:8055/items/appartement?meta=total_count&limit=0";
    $resultat = requete($recherche);
    return $resultat->meta;
}

function getPage(int $premierePage, int $locationParPage) {
    $recherche = "http://172.24.2.143:8055/items/appartement?fields=id,image,idtype.libtype,idimm.ville&page=".$premierePage."&limit=".$locationParPage;
    $resultat = requete($recherche);
    return $resultat->data;
}

function add(string $collection, array $donnees) {

    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_PORT => "8055",
      CURLOPT_URL => "http://172.24.2.143:8055/items/".$collection,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($donnees),
      CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
      ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      $resultat = "cURL Error #:" . $err;
    } else {
        $resultat = $response;
    }

    return $resultat;

}

function getReservations(int $idUtilisateur) {
    $recherche = "http://172.24.2.143:8055/items/reservation?fields=id,appartement.id,appartement.idtype.libtype,date_debut,date_fin,appartement.idimm.ville&[filter][utilisateur][_eq]=".$idUtilisateur;
    $resultat  = requete($recherche);
    return $resultat->data;
}

function getDatesReservations(int $reservation) {
    $recherche = "http://172.24.2.143:8055/items/reservation?fields=date_debut,date_fin&[filter][appartement.id][_eq]=".$reservation;
    $resultat = requete($recherche);
    return $resultat->data;
}

function verifDates(int $idAppart, string $datedebut, string $datefin) {
    $recherche="http://172.24.2.143:8055/items/reservation?%5Bfilter%5D%5Bappartement%5D%5B_eq%5D=".$idAppart."&%5Bfilter%5D%5Bdate_debut%5D%5B_eq%5D=".$datedebut."&%5Bfilter%5D%5Bdate_fin%5D%5B_eq%5D=".$datefin;
    $resultat = requete($recherche);
    
    if(empty($resultat->data)) {
        $resultat = true;
    } else {
        $resultat = false;
    }

    return $resultat;
    
}