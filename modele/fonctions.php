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
    $recherche = "http://172.24.2.143:8055/items/appartement?fields=image,idtype.libtype,idimm.ville";
    return requete($recherche);
}