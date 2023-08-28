<?php
$nombre = 20;
$somme = 0;
$decomposition = "";

for ($i = 1; $i <= $nombre; $i++) {
    $somme += $i;
    $decomposition .= $i;
    if ($i < $nombre) {
        $decomposition .= " + ";
    }
}

echo "La somme des entiers de 1 à $nombre est : $decomposition = $somme\n";
?>

