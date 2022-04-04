<body>

    <div class="contenu">

        <aside class="infos">

            <div class="info">

                <div class="enteteInfo">
                    <h2>Mes informations</h2>
                </div>

                <div class="contenuInfo">
                    <p><span class="donneeMembre">Identité :</span> <?php echo $infos->prenom.' '.$infos->nom; ?></p>
                    <p><span class="donneeMembre">Adresse-mel :</span> <?php echo $infos->identifiant; ?></p>
                    <p><span class="donneeMembre">Dernière connexion :</span> <?php echo $derniereConnexion; ?></p>
                </div>

            </div>

        </aside>
    
        <div class="page">

            <div class="entetePage">
                <h1>Bienvenue dans votre espace !</h1>
            </div>

            <div class="contenuPage">

                <p>Vous n'avez réaliser aucunes réservations.</p>
                
            </div>

        </div>

    </div>