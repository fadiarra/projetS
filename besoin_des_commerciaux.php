<!-- Créez un formulaire pour permettre aux commerciaux de poster leurs besoins en terminaux -->
<form action="traitement_besoins.php" method="POST">
  <label for="nom">Nom du commercial:</label>
  <input type="text" id="nom" name="nom" required>

  <label for="besoin">Besoin en terminaux:</label>
  <textarea id="besoin" name="besoin" required></textarea>

  <button type="submit">Soumettre</button>
</form>
<!-- Assurez-vous de créer un fichier "traitement_besoins.php" pour gérer la soumission du formulaire -->
