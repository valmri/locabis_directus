<body>

    <div class="contenu">

        <aside class="infos">

            <div class="info">

                <div class="enteteInfo">
                    <h2>Informations</h2>
                </div>

                <div class="contenuInfo">
                    <p><span class="titreInfo">Adresse :</span> <?php echo $laLocation->idimm->adimm; ?> </p>
                    <p><span class="titreInfo">Ville :</span> <?php echo $laLocation->idimm->ville; ?> </p>
                    <p><span class="titreInfo">Prix :</span> <?php echo $laLocation->idtype->tariflocbase; ?>€</p>
                </div>

            </div>

        </aside>
    
        <div class="page">

            <div class="entetePage">
                <img src="http://172.24.2.143:8055/assets/<?php echo $laLocation->image ?>" width="50%" alt="<?php echo $laLocation->idtype->libtype; ?>">
                <h1><?php echo $laLocation->idtype->libtype; ?></h1>
            </div>

            <div class="contenuPage">

                <p><?php echo $laLocation->descriptif; ?></p>
                
            </div>

        </div>

    </div>