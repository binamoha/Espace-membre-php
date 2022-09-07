<?php
session_start();
# si l'utilisateur s'est connecte
if(!isset($_SESSION['name'])){
  header("Location: connexion.php"); # redirection vers la page connexion.php
}

if(isset($_POST['logout'])){
  session_destroy(); # terminer la session
  header("Location: index.php"); # redirection vers la page index.php
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Bienvenue sur votre espace membre</h1>
  <p>
    <?php 
      echo $_SESSION['firstName']. " ". $_SESSION['name']
    ?>
  </p>
  <span>
    <?php echo $_SESSION['email']; ?>
  </span>

  <div>
    <img src="images/<?php echo $_SESSION['image'] ?>">
  </div>
  <form method="post">
    <button name="logout">deconnexion</button>
  </form>

  <a href="update.php">modifier profil</a>
  <div>
      <form method="post" action="traitement.php">
          <button name="delete">supprimer le profil</button>
  </div>
</body>
</html>