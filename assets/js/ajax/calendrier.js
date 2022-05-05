function constructionCalendrier(idAppart) {

    // Tableau des dates à cacher
    let datesReservees = new Array();

    // Récupération des réservations
    fetch("http://172.24.2.143:8055/items/reservation?fields=date_debut%2Cdate_fin&%5Bfilter%5D%5Bappartement%5D%5B_eq%5D="+idAppart, {
    "method": "GET",
    "headers": {}
    })
    .then(response => {
        console.log(response)
        /*
        TODO : Trouver une autre technique
        datesReservees.push({
            from: response.data.date_debut.toLocaleDateString('fr'),
            to: response.data.date_fin.toLocaleDateString('fr')
        })*/
    })
    .catch(err => {
    console.error(err);
    });

    console.log(datesReservees);
    // Définition du calendrier

}