<body>

    <div class="contenu">

        <aside class="infos">

            <div class="info">

                <div class="enteteInfo">
                    <h2>Mes informations</h2>
                </div>

                <div class="contenuInfo">
                    <p><span class="titreInfo">Identité :</span> <?php echo $infos->prenom.' '.$infos->nom; ?></p>
                    <p><span class="titreInfo">Adresse-mel :</span> <?php echo $infos->mel; ?></p>
                    <p><span class="titreInfo">Dernière connexion :</span> <?php echo $derniereConnexion; ?></p>
                </div>

            </div>

        </aside>
    
        <div class="page">

            <div class="entetePage">
                <h1>Bienvenue dans votre espace !</h1>
            </div>

            <?php if($reservations != null) :?>
            <?php foreach ($reservations as $reservation) :?>

            <?php if ($nbCase === 0) :?>
            <div class="contenuCarte">
            <?php endif; ?>

                <div class="carteLoc">
                    <div class="carteLoc_contenu">
                        <h2><?php echo $reservation->appartement->idtype->libtype; ?></h2>
                        <span class="infoLoca">
                            <i class="las la-map-marker"></i><?php echo $reservation->appartement->idimm->ville; ?>
                        </span><br>
                        <span class="infoLoca">
                            <i class="las la-map-marker"></i><?php echo $reservation->date_debut; ?>
                        </span>
                        <a href="?page=location&id=<?php echo $reservation->appartement->id; ?>" class="bouton">Consulter</a>
                    </div>
                </div>
                
            <?php $nbCase++; ?>
            <?php if ($nbCase === 3) :?>
            </div>
            <?php $nbCase = 0;?>
            <?php endif; ?>
            <?php endforeach; ?>

            <?php else: ?>

                <p>Vous n'avez aucunes réservations.</p>

            <?php endif; ?>

        </div>

    </div>