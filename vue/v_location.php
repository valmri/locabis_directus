<body onload="constructionCalendrier(<?= $idLocation ?>)">

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
                    <?php if ($laLocation->idimm->ascensseur) : ?>
                    <p><span class="titreInfo">Ascenseur :</span> Oui</p>
                    <?php else : ?>
                    <p><span class="titreInfo">Ascenseur :</span> Non</p>
                    <?php endif; ?>

                    <?php if (estConnecte()) :?>
                        <a href="?page=reserver&id=<?php echo $laLocation->id; ?>" class="bouton">Louer</a>
                    <?php endif; ?>
                </div>

            </div>

        </aside>

        <div class="page">

            <div class="entetePage">
            <?php if ($laLocation->image != null) :?>
            <img src="http://172.24.2.143:8055/assets/<?php echo $laLocation->image ?>?width=342&height=222" alt="<?php echo $laLocation->idtype->libtype ?>">
            <?php else :?>
            <img src="./assets/img/appart.jpg" width="50%" alt="<?php echo $laLocation->idtype->libtype; ?>">
            <?php endif; ?>
                <h1><?php echo $laLocation->idtype->libtype; ?></h1>
            </div>

            <div class="contenuPage">
                <p><?php echo $laLocation->descriptif; ?></p>
            </div>

        </div>

    </div>