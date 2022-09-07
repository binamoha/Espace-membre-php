<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    form{
      width: 50%;
      margin: auto;
    }

    div{
      margin: 20px;
    }
  </style>
</head>
<body>
  <form method="post" action="traitement.php" enctype="multipart/form-data">
    <div>
      <input type="text" name="nom" value="<?php echo $_SESSION['name'] ?>">
    </div>

    <div>
      <input type="text" name="prenom" value="<?php echo $_SESSION['firstName']; ?>">
    </div>

    <div>
      <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>">
    </div>

    <div>
      <input type="text" name="pswd" value="<?php echo $_SESSION['mdp']; ?>">
    </div>

    <div>
      <button name="update">modifier</button>
    </div>
  </form>
</body>
</html>