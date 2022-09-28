<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>The Lucky Chat</title>
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <header>
    <h1>The Lucky Chat</h1>
  </header>
  
  <section class="chat">
    <div class="messages">
     
    </div>
    <div class="user-inputs">
      <form action="handler.php?task=write" method="POST">
        <input type="text" name="author" id="author" placeholder="Pseudo ?">
        <input type="text" id="content" name="content" placeholder="Tapez votre message ici !">
        <button type="submit">Envoyer 📩</button>
      </form>
    </div>
  </section>
  <script src="js/app.js"></script>
</body>
</html>