<?php 
unset($_SESSION['identifiant']);
unset($_SESSION['motDePasse']);
unset($_SESSION['jeton']);
header('Location:?page=accueil');