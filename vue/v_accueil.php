<body>

    <div class="contenu">

        <aside class="infos">

            <div class="info">

                <div class="enteteInfo">
                    <h2>Bienvenue sur Locabis !</h2>
                </div>

                <div class="contenuInfo">
                    <p>Consultez dès aujourd'hui nos offres de location pour vos prochaines vacances.</p>
                </div>

            </div>

        </aside>
    
        <div class="page">

            <div class="entetePage">
                <h1>Nos locations</h1>
            </div>

            <?php foreach ($lesLocations->data as $laLocation) :?>

            <?php if ($nbCase === 0) :?>
            <div class="contenuCarte">
            <?php endif; ?>

                <div class="carteLoc">
                    <div class="carteLoc_entete">
                        <?php if ($laLocation->image != null) :?>
                        <img src="http://172.24.2.143:8055/assets/<?php echo $laLocation->image ?>?width=400&height=300" alt="<?php echo $laLocation->idtype->libtype ?>">
                        <?php else :?>
                        <img src="./assets/img/appart.jpg" width="100%" alt="<?php echo $laLocation->idtype->libtype; ?>">
                        <?php endif; ?>
                    </div>
                    <div class="carteLoc_contenu">
                        <h2><?php echo $laLocation->idtype->libtype; ?></h2>
                        <span class="infoLoca">
                            <i class="las la-map-marker"></i><?php echo $laLocation->idimm->ville; ?>
                        </span>
                        <a href="?page=location&id=<?php echo $laLocation->id; ?>">Consulter</a>
                    </div>
                </div>
                
            <?php $nbCase++; ?>
            <?php if ($nbCase === 3) :?>
            </div>
            <?php $nbCase = 0;?>
            <?php endif; ?>
            
            

            <?php endforeach; ?>

        </div>

    </div>