<?php
/*
- on veut 5 n° au hasard
- on veut des n° différents
- numéros de 0 à 50
- comment savoir si le n° est déjà sorti ?
- Trier les n° pour l'affichage final
*/

# rand(0, 50) premet de genrer un nombre aleatoire
# utiliser la fonction rand pour generer les nombres aleatoire
# utiliser la fonction in_array pour veriefier si un nombre exixte dans le tableau

$nombreAleatoire = [];

# tant que le tableau ne contient pas 5 chiffres
while(count($nombreAleatoire) < 5){
  # generer un nombre aleatoire
  $num = rand(0, 50);
  # verifier si le nombre $num se trouve dans le tableau $nombreAleatoire
  if(!in_array($num, $nombreAleatoire)){
    array_push($nombreAleatoire, $num);
  }
}

# convertir le tableau en une chaine de caracterer
$res = implode(" - ", $nombreAleatoire);

echo $res;