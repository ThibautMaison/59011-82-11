<?php
$tab2 = ["a" => 1 , "b" => 2 , "c" => 3 , "d" => 4 ];
$recherche = readline("Entrez un chiffre recherché : ");
foreach(array_keys($tab2) as $key) {
    echo $key . "\n";
}

$proposerTrie = readline("Entrez le trie souhaité : 1 pour croissant par la clé , 2 pour décroissant par la clé, 3 pour par la valeur : ");

function trierTableau($tab2,$proposerTrie) {
    if ($proposerTrie == 1) {
        ksort($tab2);
        return $tab2;
    } elseif ($proposerTrie == 2) {
        krsort($tab2);
        return $tab2;
    } elseif ($proposerTrie == 3) {
        arsort($tab2);
        return $tab2;
    }
}
function afficherTableau($tab2) {
    foreach ($tab2 as $key => $value) {
        echo "$key = $value" . "\n";
    }
}
afficherTableau(trierTableau($tab2,$proposerTrie));


