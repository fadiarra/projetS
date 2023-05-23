<!DOCTYPE html>
<html>
<head>
  <title>Page de connexion</title>
  <style>
    body {
      background: linear-gradient(to bottom right, #FFA500, #FF4500);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .login-form {
      background-color: white;
      padding: 50px;
      padding-right:90px;
      border-radius: 5px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }
    
    .login-form h1 {
        font-size: 40px;
        text-align: center;
        margin-top: 60px;
    }
    
    .login-form input {
      display: block;
      width: 100%;
      margin-bottom: 30px;
      padding: 15px;
      font-size: 20px;
      border: 1px solid #ccc;
      border-radius: 19px;
    }
    
    .login-form button {
      display: block;
      width: 100%;
      padding: 15px;
      font-size: 20px;
      background-color: #FF4500;
      border: none;
      border-radius: 10px;
      color: white;
      cursor: pointer;
    }
    
  </style>
</head>
<body>
  <div class="login-form">
    <h1>Connexion</h1>
    <form action="dashboard.php" method="post">
      <input type="email" name="email" placeholder="Adresse e-mail" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <button type="submit">Se connecter</button>
    </form>
  </div>
</body>
</html>
