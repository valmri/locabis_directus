<header>
    <div class="menu">
        <span class="logo">
            <a href="?page=accueil">Locabis</a>
        </span>
        <nav class="navigation">
            <ul>
                <?php if (!estConnecte()) :?>
                <li>
                    <a class="boutonMenu" href="?page=connexion">Connexion</a>
                </li>
                <?php else :?>
                    <li>
                        <a class="boutonMenu" href="?page=membre">Espace membre</a>
                    </li>
                    <li>
                        <a class="boutonMenu" href="?page=deconnexion">Déconnexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>