<!-- Créez un formulaire pour saisir une demande de réservation -->
<form action="traitement_reservation.php" method="POST">
  <label for="date">Date:</label>
  <input type="date" id="date" name="date" required>

  <label for="agent">Nom de l'agent:</label>
  <input type="text" id="agent" name="agent" required>

  <label for="quantite">Quantité à réserver:</label>
  <input type="number" id="quantite" name="quantite" required>

  <label for="client">Client bénéficiaire:</label>
  <input type="text" id="client" name="client" required>

  <button type="submit">Soumettre</button>
</form>
<!-- Assurez-vous de créer un fichier "traitement_reservation.php" pour gérer la soumission du formulaire -->
