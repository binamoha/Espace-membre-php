<?php
session_start();
if(isset($_POST['valider'])){
  $prenom = $_POST['prenom'];
  $_SESSION['user'][] = $prenom;
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
  <form method="post">
    <input type="text" name="prenom">
    <button name="valider">valider</button>
  </form>

  <br> <br>
  <table>
    <thead>
      <th style="border: solid 1px black">prenom des utilisateurs</th>
    </thead>

    <tbody>
      <?php 
        if(isset($_SESSION['user'])){
          foreach($_SESSION['user'] as $elmt) { 
            echo '<tr> <td style="border: solid 1px black">'.$elmt.'<t/d></tr>';
          } 
        }
      ?>
    </tbody>
  </table>
</body>
</html>


