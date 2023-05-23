<?php
// Connectez-vous à votre base de données

// Vérifiez si un formulaire de recherche a été soumis
if (isset($_GET['search'])) {
  // Récupérez les valeurs du formulaire de recherche
  $searchTerm = $_GET['search'];

  // Effectuez une requête de recherche dans votre base de données
  // Utilisez les valeurs de recherche pour filtrer les résultats
  $query = "SELECT * FROM stock WHERE nom LIKE '%$searchTerm%' OR type_terminal LIKE '%$searchTerm%' OR marque LIKE '%$searchTerm%'";
  // Exécutez la requête et récupérez les résultats

} else {
  // Si aucun formulaire de recherche n'a été soumis, affichez l'état du stock global
  $query = "SELECT * FROM stock";
  // Exécutez la requête et récupérez les résultats
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>État du stock</title>
  <style>
    /* Ajoutez ici votre propre style CSS */
    /* Par exemple, utilisez des couleurs, des polices et des mises en page attrayantes */
  </style>
</head>
<body>
  <h1>État du stock</h1>

  <!-- Formulaire de recherche -->
  <form method="GET" action="">
    <input type="text" name="search" placeholder="Rechercher par nom, type de terminal, marque, etc." />
    <input type="submit" value="Rechercher" />
  </form>

  <!-- Affichage des résultats de la requête -->
  <table>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Type de terminal</th>
      <th>Marque</th>
      <th>Quantité disponible</th>
    </tr>
    <!-- Boucle pour afficher les résultats -->
    <?php foreach ($results as $row) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nom']; ?></td>
        <td><?php echo $row['type_terminal']; ?></td>
        <td><?php echo $row['marque']; ?></td>
        <td><?php echo $row['quantite']; ?></td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
