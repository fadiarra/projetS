<?php
// Connectez-vous à votre base de données

// Vérifiez si un formulaire d'extraction a été soumis
if (isset($_GET['produit']) && isset($_GET['statut'])) {
  // Récupérez les valeurs du formulaire d'extraction
  $produit = $_GET['produit'];
  $statut = $_GET['statut'];

  // Effectuez une requête d'extraction dans votre base de données
  // Utilisez les valeurs du formulaire pour filtrer les résultats
  $query = "SELECT * FROM extraction WHERE produit = '$produit' AND statut = '$statut'";
  // Exécutez la requête et récupérez les résultats

} else {
  // Si aucun formulaire d'extraction n'a été soumis, affichez toutes les extractions de données
  $query = "SELECT * FROM extraction";
  // Exécutez la requête et récupérez les résultats
}
?>
<!-- Affichez les résultats de la requête dans un tableau ou d'une autre manière -->
<!-- Affichez également un formulaire d'extraction pour permettre aux utilisateurs de filtrer les données -->
