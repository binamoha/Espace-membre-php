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
      <input type="text" name="nom" placeholder="votre nom">
    </div>

    <div>
      <input type="text" name="prenom" placeholder="votre prenom">
    </div>

    <div>
      <input type="email" name="email" placeholder="votre email">
    </div>

    <div>
      <input type="password" name="pswd" placeholder="votre mot de passe">
    </div>
    
    <div>
      <input type="file" name="image">
    </div>

    <div>
      <button name="inscription">s'incrire</button>
    </div>
  </form>
</body>
</html>