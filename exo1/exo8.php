<?php
function CreerTableauAvecInvite($invite) {
    $tab = [];
    do {
        $nombre = saisirEntier($invite);
        if ($nombre != 0) {
            $tab[] = $nombre;
        }
    } while ($nombre != 0);

    $proposerTrie = readline("Entrez le tri souhaité : 1 pour croissant, 2 pour décroissant, 3 pour aléatoire : ");
    afficherTableau(trierTableau($tab, $proposerTrie));

    return $tab;
}

function saisirEntier($invite, bool $positif = false) {
    do {
        $nombre = readline($invite);
        if (!preg_match('/^(-)?[0-9]+$/', $nombre) || ($positif && $nombre < 0)) {
            echo "Veuillez entrer un nombre entier";
            echo ".\n";
        }
    } while (!preg_match('/^(-)?[0-9]+$/', $nombre) || ($positif && $nombre < 0));
    
    return $nombre;
}

function afficherTableau($tableau) {
    foreach ($tableau as $valeur) {
        echo $valeur . ' ';
    }
    echo "\n";
}

function trierTableau($tableau, $typeTri) {
    switch ($typeTri) {
        case 1:
            sort($tableau);
            break;
        case 2:
            rsort($tableau);
            break;
        case 3:
            shuffle($tableau);
            break;
        default:
            echo "Tri non reconnu.\n";
    }
    return $tableau;
}

$invite = "Entrez un nombre : ";
CreerTableauAvecInvite($invite);

function afficher_tableau_2d_plateau($nbLigne, $nbColonne) {
    $barreSeparation = "|";
    // Afficher les entêtes de colonnes
    traits($nbColonne);
    echo $barreSeparation;
    echo "     "; 
    for ($col = 0; $col < $nbColonne; $col++) {
        echo $barreSeparation;
        echo "  ";
        echo chr(65 + $col) . "  "  ;
    }
    echo $barreSeparation;
    echo "\n";

    for ($row = 1; $row <= $nbLigne; $row++) {
        traits($nbColonne);
        echo $barreSeparation;
        echo str_pad($row, 3, ' ', STR_PAD_LEFT); 
        echo "  ";
        for ($col = 0; $col < $nbColonne; $col++) {
            echo $barreSeparation;
            echo "     ";
        }   
        echo $barreSeparation;
        echo "\n";
    }
    traits($nbColonne);
}

function rechercher_valeur($valeur, $nbLigne, $nbColonne) {
    $valeur = strtoupper($valeur);
    for ($row = 1; $row <= $nbLigne; $row++) {
        for ($col = 0; $col < $nbColonne; $col++) {
            if ($valeur === chr(65 + $col) . $row) {
                return "La valeur $valeur a été trouvée à la position ($row, " . chr(65 + $col) . ").\n";
            }
        }
    }
    return "La valeur $valeur n'a pas été trouvée dans le plateau.\n";
}

$nbLigne = readline("Entrez le nombre de lignes : ");
$nbColonne = readline("Entrez le nombre de colonnes : ");

afficher_tableau_2d_plateau($nbLigne, $nbColonne);

$valeurRecherche = readline("Entrez la valeur à rechercher (par exemple, A1) : ");
echo rechercher_valeur($valeurRecherche, $nbLigne, $nbColonne);

function traits($nbcolonne)
{
    for ($j = 0; $j < $nbcolonne * 2; $j++) {

        echo "----";
    }
    echo "\n";
}

