<?php
// 1.	Saisir un tableau de X valeurs entières avec invite variable et contrôle de type
// i.	Saisir les valeurs d’un tableau jusqu’à ce que l’utilisateur saisisse 0.
// afficher le tableau trié
function CreerTableauAvecInvite($invite) {
    $tab = [];
    do {
        $nombre = saisirEntier($invite);
        $tab[] = $nombre;
    } while ($nombre != 0);
    array_pop($tab);
    trierTableau($tab);
    afficherTableau($tab);
    return $tab;
}

// CreerTableauAvecInvite($invite=readline("Entrez un nombre : "));

// 3.	Saisir un tableau à 2 dimensions de X valeurs par Y (X et Y passer en paramètre) et 
// Afficher un tableau à 2 dimensions sous forme de plateau de jeu ; c’est-à-dire avec les traits de ligne et colonnes, les entêtes de colonnes seront des lettres, chiffres pour les lignes

$lettre = saisirEntier("entrez longueur axe X : ", true );
$chiffre = saisirEntier("entrez longueur axe Y : ", true );

function tableau2D ($lettre, $chiffre) {
    $tabX = tabAlphabet();
    for ($i = 1; $i <= $lettre; $i++) {
        $tabY[] = $i;
    }
    traits($lettre);
    
    echo "|";
    for ($i = 0; $i < $lettre; $i++) {
        count($tabX);
        $x = $i % count($tabX);
        echo " " .  $tabX[$x] . " |";
    }
    for ($i = 1; $i < $chiffre; $i++) {
        echo "\n";
        traits($lettre);
        echo  "|";
        for ($j = 0; $j < $lettre; $j++) {
            $y = $j % count($tabY);
            echo " " .  $tabY[$y] . " |";
        }
    }
}

// 4.	Rechercher une valeur dans un tableau
function RechercheValeurDansTableau2D($tabX, $tabY, $valeur, $lettre, $chiffre) {
    tableau2D($lettre, $chiffre);
    $i = 0;
    $j = 0;
    while ($i < count($tabX) && $tabX[$i] != $valeur) {
        $i++;
    }
    while ($j < count($tabY) && $tabY[$j] != $valeur) {
        $j++;
    }
    if ($i < count($tabX) && $j < count($tabY)) {
        echo "la valeur se trouve en " . $tabX[$i] . $tabY[$j] . "\n";
    } else {
        echo "la valeur ne se trouve pas dans le tableau \n";
    }
}


RechercheValeurDansTableau2D($tabX, $tabY, $valeur);

// toutes les fonctions utilisées dans les exercices précédents
function trierTableau($tab) {
    shuffle($tab);
    return $tab;
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

