<?php
session_start();

# inscription
if(isset($_POST['inscription'])){
  # recuperation des informations de l'utilissateur
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $mdp = $_POST['pswd'];

  # on teste si tout les champ contiennent quelque chose
  if($nom != "" && $prenom != "" && $email != "" && $mdp != ""){
    if(!empty($_FILES)){
      $fileName = $_FILES['image']['name'];
      $tmpName = $_FILES['image']['tmp_name'];
      $destination = $_SERVER['DOCUMENT_ROOT']."/espace_membre/images/".$fileName;
      
      if(move_uploaded_file($tmpName, $destination)){
        # ici connexion a la base de donnees et requette pour enregistrer les infos de l'utilisateur dans la base
       
        $connexion = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');
        
        # preparer une requette
        $request = $connexion->prepare("INSERT INTO users (nom, prenom, email, mdp, photo) VALUES(?, ?, ?, ?, ?)");
        # execution de la requette
        $request->execute(array($nom, $prenom, $email, $mdp, $fileName));
      }else{
        echo "image error!";
      }
    }
  }
}


# la connexion
if(isset($_POST['connexion'])){
  # recuperation des infos de connexion
  $email = $_POST['email'];
  $motDePasse = $_POST['pswd'];

  # etablir la connexion avec la base de donnees
  $connexion = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');

  # requette pour verifier si le login et le mot de passe existe dans la BD et sont sur la meme ligne
  $request = $connexion->prepare("SELECT * FROM users WHERE email = ? AND mdp = ?");
  # executer la requette
  $request->execute(array($email, $motDePasse));
  $user = $request->fetch();
  // echo '<pre>';
  // print_r($user);
  // echo '<pre>';

  if(!empty($user)){
    # creation des variables de sessions
    $_SESSION['id'] = $user['id_user'];
    $_SESSION['name'] = $user['nom'];
    $_SESSION['firstName'] = $user['prenom'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['mdp'] = $user['mdp'];
    $_SESSION['image'] = $user['photo'];

    # redirection vers accueil.php
    header("Location: accueil.php");
  }else{
    echo "login ou mot de passe incorrect";
  }
}


# la modification
if(isset($_POST['update'])){
  # recuperation des informations de l'utilisateur
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $mdp = $_POST['pswd'];

  # etablir la connexion avec la base de donnees
  $connexion = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');
  # preparer la requette de modification
  $request = $connexion->prepare("UPDATE users SET nom = ?, prenom = ?, email = ?, mdp = ? WHERE id_user = ?");
  # executer la requette
  $request->execute(array($nom, $prenom, $email, $mdp, $_SESSION['id']));
  header("Location: connexion.php");
}
# suppresion du profil
if(isset($_POST['delete'])){
  # etablire la connexion avec la BD
  $connexion = new PDO('mysql:host=localhost;dbname=espace_membre', 'admin', 'passer');
  # requette pour supprimer le profil
  $request = $connexion->prepare("DELETE FROM users WHERE id_user = ?");
  # executer la requette
  $request->execute(array($_SESSION['id']));
  session_destroy();
  header("Location: index.php");
}