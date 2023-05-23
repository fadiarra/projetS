<!-- gestion_inventaire.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Gestion de l'inventaire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/f2dba94720.js" crossorigin="anonymous"></script>
    <style>
       
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #272727;
      color: #fff;
    }

    h2 {
      color: #ff6c00;
      text-align: center;
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      margin: 20px auto;
      color: #272727;
    }

    th {
      background-color: #ff6c00;
      color: #fff;
      padding: 15px;
      text-align: left;
      font-weight: normal;
      font-size: 18px;
      text-transform: uppercase;
    }

    td {
      padding: 15px;
      text-align: left;
      font-weight: normal;
      font-size: 16px;
    }

    .btn-modifier, .btn-supprimer {
      background-color: #ff6c00;
      color: #fff;
      border: none;
      padding: 8px 12px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn-modifier:hover, .btn-supprimer:hover {
      background-color: #ff4500;
    }

    .icon-modifier, .icon-supprimer {
      margin-right: 5px;
    }

    .modifier-page {
      display: none;
      background-color: #fff;
      color: #272727;
      padding: 20px;
      border-radius: 5px;
      margin-top: 10px;
    }

    .modifier-page h2 {
      margin-top: 0;
    }

    .modifier-page input[type="text"],
    .modifier-page input[type="number"],
    .modifier-page input[type="date"] {
      width: 100%;
      padding: 8px 12px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      margin-bottom: 10px;
    }

    .modifier-page input[type="submit"] {
      background-color: #ff6c00;
      color: #fff;
      border: none;
      padding: 10px 16px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .modifier-page input[type="submit"]:hover {
      background-color: #ff4500;
    }
  
    </style>
</head>
<body>
    <?php
    // Configuration de la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "gestion_stock";

    // Connexion à la base de données
    $connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    if (!$connexion) {
        die("Échec de la connexion à la base de données: " . mysqli_connect_error());
    }

    // Vérifier si le formulaire a été soumis pour l'ajout ou la mise à jour des données
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si l'ID est défini pour la mise à jour des données
        if (isset($_POST["modifier_id"])) {
            $id = $_POST["modifier_id"];
            $requete_modifier = "UPDATE inventaire SET date = ?, article = ?, disponible = ?, reserve = ?, stock_nessico = ?, stock_physique = ?, ecarts = ?, commentaire_inventaire = ? WHERE id = ?";
            $statement_modifier = mysqli_prepare($connexion, $requete_modifier);
            mysqli_stmt_bind_param($statement_modifier, "ssiiiiisi", $_POST["modifier_date"], $_POST["modifier_article"], $_POST["modifier_disponible"], $_POST["modifier_reserve"], $_POST["modifier_stock_nessico"], $_POST["modifier_stock_physique"], $_POST["modifier_ecarts"], $_POST["modifier_commentaire_inventaire"], $id);
            if (mysqli_stmt_execute($statement_modifier)) {
                echo "Données mises à jour avec succès.";
            } else {
                echo "Erreur lors de la mise à jour des données: " . mysqli_error($connexion);
            }
            mysqli_stmt_close($statement_modifier);
        } else {
            // Ajout de nouvelles données
            $requete_ajouter = "INSERT INTO inventaire (date, article, disponible, reserve, stock_nessico, stock_physique, ecarts, commentaire_inventaire) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $statement_ajouter = mysqli_prepare($connexion, $requete_ajouter);
            mysqli_stmt_bind_param($statement_ajouter, "ssiiiiis", $_POST["date"], $_POST["article"], $_POST["disponible"], $_POST["reserve"], $_POST["stock_nessico"], $_POST["stock_physique"], $_POST["ecarts"], $_POST["commentaire_inventaire"]);
            if (mysqli_stmt_execute($statement_ajouter)) {
                echo "Données insérées avec succès.";
            } else {
                echo "Erreur lors de l'insertion des données: " . mysqli_error($connexion);
            }
            mysqli_stmt_close($statement_ajouter);
        }
    }

    // Supprimer une ligne
    if (isset($_GET["supprimer"])) {
        $id_supprimer = $_GET["supprimer"];
        $requete_supprimer = "DELETE FROM inventaire WHERE id = ?";
        $statement_supprimer = mysqli_prepare($connexion, $requete_supprimer);
        mysqli_stmt_bind_param($statement_supprimer, "i", $id_supprimer);
        if (mysqli_stmt_execute($statement_supprimer)) {
            echo "Ligne supprimée avec succès.";
        } else {
            echo "Erreur lors de la suppression de la ligne: " . mysqli_error($connexion);
        }
        mysqli_stmt_close($statement_supprimer);
    }
    

    // Récupérer la ligne pour la modification
if (isset($_GET["modifier"])) {
    $id_modifier = $_GET["modifier"];
    $requete_modifier = "SELECT * FROM inventaire WHERE id = ?";
    $statement_modifier = mysqli_prepare($connexion, $requete_modifier);
    mysqli_stmt_bind_param($statement_modifier, "i", $id_modifier);
    mysqli_stmt_execute($statement_modifier);
    $resultat_modifier = mysqli_stmt_get_result($statement_modifier);
    $ligne_modifier = mysqli_fetch_assoc($resultat_modifier);
    mysqli_stmt_close($statement_modifier);
}

// Soumettre la mise à jour des données
if (isset($_POST["modifier_id"])) {
    $id = $_POST["modifier_id"];
    $requete_mise_a_jour = "UPDATE inventaire SET date = ?, article = ?, disponible = ?, reserve = ?, stock_nessico = ?, stock_physique = ?, ecarts = ?, commentaire_inventaire = ? WHERE id = ?";
    $statement_mise_a_jour = mysqli_prepare($connexion, $requete_mise_a_jour);
    mysqli_stmt_bind_param($statement_mise_a_jour, "ssiiiiisi", $_POST["date"], $_POST["article"], $_POST["disponible"], $_POST["reserve"], $_POST["stock_nessico"], $_POST["stock_physique"], $_POST["ecarts"], $_POST["commentaire_inventaire"], $id);
    if (mysqli_stmt_execute($statement_mise_a_jour)) {
        echo "Données mises à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour des données: " . mysqli_error($connexion);
    }
    mysqli_stmt_close($statement_mise_a_jour);
}
// Construction de la requête SQL avec la clause WHERE pour le filtrage
$requete_afficher = "SELECT * FROM inventaire";
if (isset($_GET["recherche"])) {
    $terme_recherche = $_GET["recherche"];
    $requete_afficher .= " WHERE article LIKE '%$terme_recherche%'";
}
$resultat_afficher = mysqli_query($connexion, $requete_afficher);


    ?>

    <h2>Gestion de l'inventaire</h2>
<form method="GET" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="text" name="recherche" placeholder="Rechercher un article">
    <button type="submit"><i class="fas fa-search"></i> Rechercher</button>
</form>


    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <?php if (isset($ligne_modifier)) { ?>
            <input type="hidden" name="modifier_id" value="<?php echo $ligne_modifier['id']; ?>">
        <?php } ?>

        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="<?php if (isset($ligne_modifier)) echo $ligne_modifier['date']; ?>" required><br><br>

        <label for="article">Article:</label>
        <input type="text" name="article" id="article" value="<?php if (isset($ligne_modifier)) echo $ligne_modifier['article']; ?>" required><br><br>

        <label for="disponible">Disponible:</label>
        <input type="number" name="disponible" id="disponible" value="<?php if (isset($ligne_modifier)) echo $ligne_modifier['disponible']; ?>" required><br><br>

        <label for="reserve">Réservé:</label>
        <input type="number" name="reserve" id="reserve" value="<?php if (isset($ligne_modifier)) echo $ligne_modifier['reserve']; ?>" required><br><br>

        <label for="stock_nessico">Stock NESSICO:</label>
        <input type="number" name="stock_nessico" id="stock_nessico" value="<?php if (isset($ligne_modifier)) echo $ligne_modifier['stock_nessico']; ?>" required><br><br>

        <label for="stock_physique">Stock physique:</label>
        <input type="number" name="stock_physique" id="stock_physique" value="<?php if (isset($ligne_modifier)) echo $ligne_modifier['stock_physique']; ?>" required><br><br>

        <label for="ecarts">Écarts:</label>
        <input type="number" name="ecarts" id="ecarts" value="<?php if (isset($ligne_modifier)) echo $ligne_modifier['ecarts']; ?>" required><br><br>

        <label for="commentaire_inventaire">Commentaire:</label>
        <input type="text" name="commentaire_inventaire" id="commentaire_inventaire" value="<?php if (isset($ligne_modifier)) echo $ligne_modifier['commentaire_inventaire']; ?>"><br><br>

        <?php if (isset($ligne_modifier)) { ?>
            <button type="submit">Modifier</button>
        <?php } else { ?>
            <button type="submit">Ajouter</button>
        <?php } ?>
    </form>

    <h3>Tableau de l'inventaire</h3>

    <table>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Article</th>
            <th>Disponible</th>
            <th>Réservé</th>
            <th>Stock NESSICO</th>
            <th>Stock physique</th>
            <th>Écarts</th>
            <th>Commentaire</th>
            <th>Actions</th>
        </tr>
        <?php
        $requete_afficher = "SELECT * FROM inventaire";
        $resultat_afficher = mysqli_query($connexion, $requete_afficher);

        while ($ligne_afficher = mysqli_fetch_assoc($resultat_afficher)) {
            echo "<tr>";
            echo "<td>" . $ligne_afficher['id'] . "</td>";
            echo "<td>" . $ligne_afficher['date'] . "</td>";
            echo "<td>" . $ligne_afficher['article'] . "</td>";
            echo "<td>" . $ligne_afficher['disponible'] . "</td>";
            echo "<td>" . $ligne_afficher['reserve'] . "</td>";
            echo "<td>" . $ligne_afficher['stock_nessico'] . "</td>";
            echo "<td>" . $ligne_afficher['stock_physique'] . "</td>";
            echo "<td>" . $ligne_afficher['ecarts'] . "</td>";
            echo "<td>" . $ligne_afficher['commentaire_inventaire'] . "</td>";
            echo "<td><a href='" . $_SERVER["PHP_SELF"] . "?supprimer=" . $ligne_afficher['id'] . "'>Supprimer</a> | <a href='" . $_SERVER["PHP_SELF"] . "?modifier=" . $ligne_afficher['id'] . "'>Modifier</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    // Fermer la connexion à la base de données
    mysqli_close($connexion);
    ?>
    
</body>
</html>
