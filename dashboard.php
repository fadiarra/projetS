<!DOCTYPE html>
<html>
<head>
  <title>Tableau de bord - Gestion de stock</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    
    .navbar {
      background-color:orange;
      color: #fff;
      padding: 50px;
      border-radius: 10px;
      margin-left: 10px;
      margin-right: 10px;
    }
    
    .navbar .logo {
      font-size: 40px;
      float: left;
    }
    
    .navbar .logout-btn {
      color: green;
      border-radius: 10px;
    }
    
    .sidebar {
      background-color: #f8f9fa;
      width: 250px;
      padding: 20px;
      float: left;
      height: calc(90vh - 50px);
    }
    
    .sidebar ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    
    .sidebar li {
      margin-bottom: 30px;
    }
    
    .sidebar li a {
      display: block;
      color: #333;
      text-decoration: none;
      font-size: 20px;
      border-bottom: 1px solid transparent;
      transition: border-color 0.3s ease;
    }
    
    .sidebar li a:hover {
      border-color: orange;
    }
    
    .content {
      margin-left: 240px;
      padding: 20px;
    }
    
    .content h2 {
      margin-bottom: 20px;
    }
    
    .content .card {
      width: 410px;
      height: 310px;
      padding: 20px;
      margin-bottom: 20px;
      text-align: center;
      border-radius: 5px;
      display: inline-block;
      border: 1px solid #ccc;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .card a {
      text-decoration: none;
      color: #333;
    }
    
    .card:hover {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      transform: scale(1.02);
    }
    
    .card:nth-child(1) {
      background-color: #ffdf8c;
    }
    
    .card:nth-child(2) {
      background-color: #9cecff;
    }
    
    .card:nth-child(3) {
      background-color: #ffb4b4;
    }
    
    .card i {
      font-size: 60px;
      margin-bottom: 10px;
      display: block;
    }
    
    .footer {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
      margin-top: 130px;
      padding-left: 20px;
    }
    
    .footer p {
      margin: 0;
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="container">
      <span class="logo">Application Gestion de Stock DDE</span>
      <a href="welcome.html" class="logout-btn"><button type="button" class="btn btn-success btn-lg">Déconnexion</button></a>
    </div>
  </nav>
  
  <div class="sidebar">
    <ul>
      <li><a href="etat_de_stock.php"><i class="fas fa-cubes"></i> État de stock</a></li>
      <li><a href="reservations.php"><i class="fas fa-clipboard-check"></i> Réservations</a></li>
      <li><a href="demandes_en_attente.php"><i class="fas fa-clock"></i> Demandes en attente</a></li>
      <li><a href="mouvements.php"><i class="fas fa-exchange-alt"></i> Mouvements</a></li>
      <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
    </ul>
  </div>
  
  <div class="content">
    <h2>Tableau de bord</h2>
    
    <div class="card">
      <a href="extraction_des_donnees.php">
        <i class="fas fa-download"></i>
        <h4>Extraction des données</h4>
      </a>
    </div>
    
    <div class="card">
      <a href="besoins_des_commerciaux.php">
        <i class="fas fa-handshake"></i>
        <h4>Besoins des commerciaux</h4>
      </a>
    </div>
    
    <div class="card">
      <a href="gestion_des_inventaires.php">
        <i class="fas fa-clipboard-list"></i>
        <h4>Gestion des inventaires</h4>
      </a>
    </div>
  </div>
  
  <div class="footer">
    <p>Tous droits réservés &copy; 2023</p>
  </div>
  
  <script src="https://kit.fontawesome.com/f2dba94720.js" crossorigin="anonymous"></script>
</body>
</html>
