<?php

function genererMotAFaireDeviner ($mot) {
    return $mot;
}

// afficher le mot a faire deviner avec des _ pour chaque lettre
function afficherMotAfaireDeviner ($motAfaireDeviner) {
return $motAfaireDeviner;
}


//mettre un limite de 10erreur pour trouver entierement le mot mais le mot peut etre trouver avant si le mot a été deviner avant les 10 propositions on peut generer un schema de 10 etapes pour rentre la chose plus visuel sinon juste mettre le nombre de chance restant
function afficherEtapePendu ($nbErreur) {
return $nbErreur;
}

// demander le nombre de personne qui participe au jeu et rentrer leur nom
function demanderNombreJoueur () {

}
// choisir dans quel odre les personnes commence en triant aleatoirement les noms de participant
function choisirOrdrePassage () {

}
// =>debuter la partie 
// trouver un mot a faire deviner
// la stocker dans une variable
function debuterPartie () {
}

// choix du niveau de difficulté
function choisirNiveauDifficulte () {
return $difficulte;
}


// joueur 1 propose un lettre => si la lettre existe alors afficher toute les lettres dans le mot similaire a la proposition en plus des lettres deja trouver mais en plus de ca stocker la lettre *
// qu'il a proposer dans un tableau comme ca lors des tours suivant si quelqu'un redit la lettre un message apparait pour lui dire que ca a deja été dit et cette meme personne a 
// le droit de reproposer une lettre  => sinon demarrer le schema/diminuer le nombre chance restant
function proposerLettre () {

}
function comparerLettreProposer ($tablettreStock,$lettreProposer) {
return $lettreProposer;

}

function afficherLettreDejaProposer () {

}

function stockLettreProposer () {

}

function propositionDeMot ($guess) {
return $guess;
}

function analyserPropositionDeMot ($guess,$motAfaireDeviner) {
return $guess;
}

function joueurSuivant ($tabJoueur,$ordrePassage,$nbJoueur) {
return $nomJoueur;
}



// si les 10 erreur est atteinte alors ecrire defaite tout en revelant le mot choisi au depart
function defaite () {

}

//si toutes les lettres on etait trouver pour le mot ou que une propositions de mot a été faites,qu'elle correspond au mot de dapart alors le jeu s'arrete et ecrit victoire
function victoire () {

}