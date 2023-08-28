<?php
$totalprix = 0;
$nbritem = 0;

while (true) {
    $prix = readline("Prix de l'article : ");
    if ($prix == 0) {
        break;
    }
    $totalprix += $prix;
    $nbritem++;
}


echo "Nombre d'articles : $nbritem";
echo "Somme due : $totalprix Euros";
$montantpayer = readline("Montant payé par le client : ");


if ($montantpayer < $totalprix) {
    echo "Le montant payé est insuffisant. Le client doit payer au moins $totalprix Euros.";
} else {
    $change = $montantpayer - $totalprix;
    echo "Monnaie à rendre : $change Euros";
    $notes20 = floor($change / 20);
    $change %= 20;
    $notes10 = floor($change / 10);
    $change %= 10;
    $notes5 = floor($change / 5);
    $change %= 5;
    $notes2 = floor($change / 2);
    $change %= 2;
    $notes1 = $change;
    if ($notes20 > 0) {
        echo "billet de 20 Euros : $notes20";
    }
    if ($notes10 > 0) {
        echo "billet de 10 Euros : $notes10";
    }
    if ($notes5 > 0) {
        echo "billet de 5 Euros : $notes5";
    }
    if ($notes2 > 0) {
        echo "Pièces de 2 Euro : $notes2";
    }
    if ($notes1 > 0) {
        echo "Pièces de 1 Euro : $notes1";
    }
}
?>
