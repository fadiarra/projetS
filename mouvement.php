<?php
// Connectez-vous à votre base de données

// Vérifiez si un formulaire de mouvement a été soumis
if (isset($_POST['type']) && isset($_POST['quantite']) && isset($_POST['date']) && isset($_POST['commentaire'])) {
  // Récupérez les valeurs du formulaire de mouvement
  $type = $_POST['type'];
  $quantite = $_POST['quantite'];
  $date = $_POST['date'];
  $commentaire = $_POST['commentaire'];

  // Effectuez une requête pour enregistrer le mouvement dans votre base de données
  $query = "INSERT INTO mouvements (type, quantite, date, commentaire) VALUES ('$type', '$quantite', '$date', '$commentaire')";
  // Exécutez la requête pour enregistrer le mouvement
}
?>
<!-- Créez un formulaire pour enregistrer les mouvements -->
<form action="" method="POST">
  <label for="type">Type de mouvement:</label>
  <input type="text" id="type" name="type" required>

  <label for="quantite">Quantité:</label>
  <input type="number" id="quantite" name="quantite" required>

  <label for="date">Date:</label>
  <input type="date" id="date" name="date" required>

  <label for="commentaire">Commentaire:</label>
  <textarea id="commentaire" name="commentaire" required></textarea>

  <button type="submit">Enregistrer</button>
</form>
