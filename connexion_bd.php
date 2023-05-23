<?php
$serveur = "localhost";
$utilisateur = "root";
$mdp = "";
$bd = "gestion_stock";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $mdp, $bd);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données: " . $connexion->connect_error);
}
?>
