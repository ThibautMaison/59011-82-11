<?php
/**
 * 
 *  permet de generer un mot aléatoirement
 * @param string $mot
 * @return array retourne le mot généré en fonction de choix rempli au préalable
 */
function genererMotAFaireDeviner ($mot) {
    return $mot;
}


/**
 * Undocumented function
 * affichage du mot généré 
 * @param string $motAfaireDeviner
 * @return array retourne l'affichage du mot généré
 */
function afficherMotAfaireDeviner ($motAfaireDeviner) {
return $motAfaireDeviner;
}


//mettre un limite de 10erreur pour trouver entierement le mot mais le mot peut etre trouver avant si le mot a été deviner avant les 10 propositions on peut generer un schema de 10 etapes pour rentre la chose plus visuel sinon juste mettre le nombre de chance restant

/**
 * Undocumented function
 * affichage du nombre de tentative restante
 * @param int $nbErreur 
 * @return array return $nbErreur 
 */
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

/**
 * Undocumented function
 *modifie l'affichage du mot en fonction des lettres trouver
 * @param string $motAfaireDeviner
 * @return array $motAfaireDeviner
 */
function modificationAffichageMot ($motAfaireDeviner) {
return $motAfaireDeviner;
}


// joueur 1 propose un lettre => si la lettre existe alors afficher toute les lettres dans le mot similaire a la proposition en plus des lettres deja trouver mais en plus de ca stocker la lettre *
// qu'il a proposer dans un tableau comme ca lors des tours suivant si quelqu'un redit la lettre un message apparait pour lui dire que ca a deja été dit et cette meme personne a 
// le droit de reproposer une lettre  => sinon demarrer le schema/diminuer le nombre chance restant
function saisirLettre () {

}
/**
 * Undocumented function
 * analyse la lettre proposer par le joueur
 * @param bool $tableaulettreStock
 * @param string $lettreProposer
 * @return array retourne si la lettre existe dans le mot ou le tableau de lettre deja proposer
 */
function analyserLettreProposer ($tableaulettreStock,$lettreProposer) {
return $lettreProposer;

}


function afficherLettreDejaProposer () {

}

function stockLettreProposer () {

}
/**
 * Undocumented function
 * permet de proposer un un mot 
 * @param string $guess
 * @return array 
 */
function propositionDeMot () {
return $guess;
}
/**
 * Undocumented function
 * compare le mot proposer avec le mot a faire deviner
 * @param string $guess
 * @param string $motAfaireDeviner
 * @return void retourne vrai ou faux en fonction de la comparaison
 */
function analyserPropositionDeMot ($guess,$motAfaireDeviner) {;
}

/**
 * Undocumented function
 * permet de passer au joueur suivant
 * @param int $ordrePassage
 * @param int $nbJoueur
 * @return array retourne le nom du joueur suivant
 */
function joueurSuivant ($ordrePassage,$nbJoueur) {
return $nomJoueur;
}


/**
 * Undocumented function
 * affichage du message game over
 * @param int $nbErreur
 * @return array retourne un message game over
 */
// si les 10 erreur est atteinte alors ecrire defaite tout en revelant le mot choisi au depart
function defaite ($nbErreur) {

}
/**
 * Undocumented function
 * affichage du message victoire
 * @return array retourne un message victoire
 */
//si toutes les lettres on etait trouver pour le mot ou que une propositions de mot a été faites,qu'elle correspond au mot de dapart alors le jeu s'arrete et ecrit victoire
function victoire () {

}