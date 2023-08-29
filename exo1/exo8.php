<?php
// 1.	Saisir un tableau de X valeurs entières avec invite variable et contrôle de type
// i.	Saisir les valeurs d’un tableau jusqu’à ce que l’utilisateur saisisse 0.
// afficher le tableau trié
// function CreerTableauAvecInvite($invite){
//     $tab = [];
//     do {
//         $nombre = saisirEntier($invite);
//         $tab[] = $nombre;
//     } while ($nombre != 0);
//     array_pop($tab);
//     $proposerTrie = readline("Entrez le trie souhaité : 1 pour croissant , 2 pour décroissant, 3 pour aléatoire : ");
//     afficherTableau(trierTableau($tab,$proposerTrie));
//     return $tab;
// }

// CreerTableauAvecInvite($invite=readline("Entrez un nombre : "));

// 3.	Saisir un tableau à 2 dimensions de X valeurs par Y (X et Y passer en paramètre) et 
// Afficher un tableau à 2 dimensions sous forme de plateau de jeu ; c’est-à-dire avec les traits de ligne et colonnes, les entêtes de colonnes seront des lettres, chiffres pour les lignes

$lettre = saisirEntier("entrez longueur axe X : ", true );
$chiffre = saisirEntier("entrez longueur axe Y : ", true );

function tableau2D ($lettre, $chiffre) {
    $tabX = tabAlphabet();
    traits($lettre);
    echo "|";
    echo "  " ." |";
    for ($i = 0; $i < $lettre; $i++) {
        $tabY[] = $i;
        count($tabX);
        $x = $i % count($tabX);
        echo " " .  $tabX[$x] . " |";
    }
    for ($i = 0; $i < $chiffre; $i++) {
        echo "\n";
        traits($lettre);
        echo  "|";
        echo " " . $tabY[$i] . " |";
    }
    $recherche = readline("Entrez un chiffre recherché : ");
    $position = array_search($recherche, $tabY);
    echo $position;

}
tableau2D($lettre, $chiffre);


// toutes les fonctions utilisées dans les exercices précédents
function trierTableau($tab,$proposerTrie) {
    if ($proposerTrie == 1) {
        sort($tab);
        return $tab;
    } elseif ($proposerTrie == 2) {
        rsort($tab);
        return $tab;
    } elseif ($proposerTrie == 3) {
        shuffle($tab);
        return $tab;
    }
}


function saisirEntier($invite,bool $positif=false) {
    do {
        $nombre = readline($invite);
    } while (!preg_match('/^(-)?[0-9]+$/', $nombre) || ($positif && $nombre < 0));
    return $nombre;
}

function afficherTableau($tab) {
    foreach ($tab as $value) {
        echo $value . "\n";
    }
}
function tabAlphabet()
{
    foreach (range('A', 'Z') as $i) {
        $tab[] = $i;
    }
    return $tab;
}
function traits($chiffre)
{
    for ($j = 0; $j < $chiffre; $j++) {

        echo "----";
    }
    echo "\n";
}

