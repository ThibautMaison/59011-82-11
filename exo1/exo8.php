<?php
$plateau = array();

// Initialisation du plateau avec des valeurs vides
$rows = 5;
$columns = 5;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $plateau[$i][$j] = '-';
    }
}

// Placement de quelques symboles sur le plateau (simulation du jeu)
$plateau[1][4] = readline();
$plateau[2][4] = readline();

// Affichage du plateau
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        echo $plateau[$i][$j] . ' ';
    }
    echo "\n";
}
?>