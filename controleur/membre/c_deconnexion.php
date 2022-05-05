<?php 
unset($_SESSION['mel']);
unset($_SESSION['motDePasse']);
unset($_SESSION['jeton']);
session_destroy();
header('Location:?page=accueil');