<?php

require_once './vue/elements/head.php';

require_once './controleur/controleurPrincipal.php';

if(isset($_GET['page']) && !empty($_GET['page'])) {

    // Nom page
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

    $controleur = controleur($page);

    require_once './controleur/'.$controleur;

} else {

    require_once './vue/v_accueil.php';

}

require_once './vue/elements/footer.php';