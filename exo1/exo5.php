<?php
$age = readline("Entrez l'âge du conducteur : ");
$dureePermis = readline("Entrez la durée du permis en années : ");
$nbrAccident = readline("Entrez le nombre d'accidents responsables : ");
$anneesFidelite = readline("Entrez le nombre d'années de fidélité : ");

if ($age < 25) {
    if ($dureePermis < 2 && $nbrAccident === 0) {
        $tarif = "rouge";
    } elseif ($dureePermis >= 2) {
        if ($nbrAccident === 0) {
            $tarif = "orange";
        } else {
            $tarif = "refusé";
        }
    } else {
        $tarif = "refusé";
    }
} elseif ($age >= 25) {
    if ($dureePermis < 2) {
        if ($nbrAccident === 0) {
            $tarif = "orange";
        } else {
            $tarif = "rouge";
        }
    } elseif ($dureePermis >= 2) {
        if ($nbrAccident === 0) {
            $tarif = "vert";
        } elseif ($nbrAccident === 1) {
            $tarif = "orange";
        } elseif ($nbrAccident === 2) {
            $tarif = "rouge";
        } else {
            $tarif = "refusé";
        }
    } else {
        $tarif = "refusé";
    }
}

if ($anneesFidelite > 1) {
    if ($tarif === "orange") {
        $tarif = "vert";
    } elseif ($tarif === "rouge") {
        $tarif = "orange";
    }
}
echo "Le conducteur a droit au tarif : " . $tarif . "\n";
?>