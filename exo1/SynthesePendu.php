<?php
/**
 * initialise les paramètres du jeu
 *
 * @return array Tableau associatif qui retourne toute les variables d'initialisation
 */
function init(){
    $motAChercher = determinerMotAChercher();
    $difficulte = saisirDifficulte();
    $nbJoueur = saisirNbJoueur();
    $nbVie = saisirNbVie();
    return ["motAChercher" => $motAChercher, "difficulte" => $difficulte, "nbJoueur" => $nbJoueur, "nbVie" => $nbVie];
    jeu($motAChercher,$difficulte,$nbJoueur,$nbVie);
}

/**
 * Demande le niveau de difficulté à l'utilisateur
 *
 * @return int niveau de difficulte
 */
function saisirDifficulte(){
    echo "Choisissez un niveau de difficulté\n";
    echo "1 - Facile\n";
    echo "2 - Moyen\n";
    echo "3 - Difficile\n";
    $difficulte = readline("");
    return $difficulte;

}

/**
 * Demande le nombre de joueur
 *
 * @return int nombre de joueurs
 */
function saisirNbJoueur(){
    echo "Combien de joueurs ?\n";
    $nbJoueur = readline("");
    return $nbJoueur;

}

/**
 * Demande le nombre de vie aux joueurs
 *
 * @return int nombre de vie
 */
function saisirNbVie(){
    echo "Combien de vie ?\n";
    $nbVie = readline("");
    return $nbVie;
}

/**
 * Choisi au hasard un mot dans une liste
 *
 * @return string mot qui doit être trouvé par les joueurs
 */
function determinerMotAChercher(){
    $listeMot = ["voiture","maison","ordinateur","table","chaise","bureau","fenetre","porte","telephone","souris","clavier","ecran","stylo","feutre","carnet","cahier","cartable","sac","sac a dos","carte","carte bleu","carte bancaire","carte d'identité","carte de fidélité","carte de visite","carte de voeux","carte de voeux","carte de noel","carte de voeux","carte de noel","carte de visite","carte de fidélité","carte bancaire","carte bleu","carte","cahier","carnet","feutre","stylo","ecran","clavier","souris","telephone","porte","fenetre","bureau","chaise","table","ordinateur","maison","voiture"];
    $motAChercher = $listeMot[rand(0,count($listeMot)-1)];
    return $motAChercher;
}

function jeu($motAChercher,$difficulte,$nbJoueur,$nbVie){
    $motCode = coderMot($motAChercher,$difficulte);
    $joueurEnCours = 1;
    $propositions = "";
    while(estGagne($motCode) == 0 && $nbVie > 0){
        affichageGlobal($nbVie,$motCode,$joueurEnCours,$propositions);
        $lettre = saisirLettre($joueurEnCours);
        verifierLettre($lettre,$motCode,$motAChercher,$difficulte,$propositions);
        $propositions .= $lettre." ";
        $joueurEnCours = joueurSuivant($nbJoueur,$joueurEnCours);
    }
    $resultat = estGagne($motCode);
    conclusion($resultat);
}

/**
 * Construit un tableau du mot en fonction de la difficulté
 *
 * @param string $mot Mot à chercher
 * @param integer $difficulte Difficulté de la partie indiquée
 * @return array Le tableau du mot
 */
// niveau facile je veux que le mot soit afficher en entier avec des _ pour les lettres sauf la premiere et derniere lettre
// niveau moyen je veux que le mot soit afficher en entier avec des _ pour les lettres sauf la premiere lettre
// niveau difficile je veux que le mot soit afficher en entier avec des _ pour les lettres
function coderMot(string $mot, int $difficulte){
    $motCode = [];
    if($difficulte == 1){
        $motCode = str_split($mot);
        for($i = 1; $i < count($motCode)-1; $i++){
            $motCode[$i] = "_";
        }
    }elseif($difficulte == 2){
        $motCode = str_split($mot);
        for($i = 1; $i < count($motCode); $i++){
            $motCode[$i] = "_";
        }
    }else{
        for($i = 0; $i < strlen($mot); $i++){
            $motCode[$i] = "_";
        }
    }
    return $motCode;
}

/**
 * Affiche le mot codé
 *
 * @param array $motCode Tableau du mot codé
 * @return void
 */
function afficherMotCode(array $motCode){
    for($i = 0; $i < count($motCode); $i++){
        echo $motCode[$i]." ";
    }
    echo "\n";
}

/**
 * Permet de décider qui va jouer
 *
 * @param integer $nbJoueur Le nombre de joueur
 * @param integer $joueurEnCours Le joueur qui vient de jouer
 * @return void
 */
function joueurSuivant(int $nbJoueur, int $joueurEnCours){
    if($joueurEnCours == $nbJoueur){
        return 1;
    }else{
        return $joueurEnCours + 1;
    }
}

/**
 * Permet au joueur en cours de proposer une lettre
 *
 * @param integer $joueurEnCours Celui qui doit jouer
 * @return string La lettre ayant été proposée
 */
function saisirLettre(int $joueurEnCours){
    echo "Joueur ".$joueurEnCours." : ";
    $lettre = readline();
    return $lettre;
}

/**
 * Vérifie si la lettre fait partie du mot ou pas
 *
 * @param string $lettre La lettre entrée par le joueur
 * @param array $motCode La partie du mot que le joueur connait
 * @param string $mot Le mot que le joueur doit trouvé
 * @param int $difficulte La difficulte de la partie
 * @param string $propositions Les lettre déjà proposées
 * @return void
 */

 // niveau facile je veux que toute les lettres soit ajouté au mot codé si elle est dans le mot a trouver 
 // niveau moyen je veux que seulement une lettre soit ajouté au mot codé si elle est dans le mot a trouver
function verifierLettre(string $lettre, array $motCode, string $mot, int $difficulte, string $propositions){
}

function stockLettreProposer(string $lettre, string $propositions){
}

/**
 * Vérifie si la lettre est correcte et pas encore ajoutée
 *
 * @param string $lettre
 * @param array $motcode
 * @param string $mot
 * @return bool
 */
function estCorrecte(string $lettre, array $motcode, string $mot){
    if(!in_array($lettre,$motcode) && in_array($lettre,str_split($mot))){
        return true;
    }else{
        return false;
    }
}

/**
 * Ajoute la lettre au mot codé en fonction du niveau de difficulté
 *
 * @param string $lettre
 * @param array $motcode
 * @param string $mot
 * @param integer $difficulte
 * @return array Le mot codé
 */
function ajouterLettre(string $lettre, array $motcode, string $mot, int $difficulte){
    if($difficulte == 1){
        for($i = 0; $i < strlen($mot); $i++){
            if($mot[$i] == $lettre){
                $motcode[$i] = $lettre;
            }
        }
    }else{
        $motcode[array_search($lettre,str_split($mot))] = $lettre;
    }
    return $motcode;
}

/**
 * Clear la console et réaffiche le jeu dans l'état actuel
 *
 * @param integer $nbVie
 * @param array $motCode
 * @param integer $joueurEnCours
 * @param string $propositions
 * @return void
 */
function affichageGlobal(int $nbVie, array $motCode, int $joueurEnCours, string $propositions){
    echo "\033[2J\033[;H";
    affichageVie($nbVie);
    afficherMotCode($motCode);
    echo $joueurEnCours;
    echo $propositions;
}

/**
 * Affiche le nombre de vie restante + pendu ?
 *
 * @param integer $nbVie
 * @return void
 */
function affichageVie(int $nbVie){
    echo "Vie restante : ".$nbVie."\n";
}

/**
 * Undocumented function
 *
 * @param array $motCode
 * @return int Etat de la partie (0 -1 1
 * 0 = en cours
 * -1 = perdu
 * 1 = gagne
 * */
function estGagne(array $motCode){
    if(in_array("_",$motCode)){
        return 0;
    }else{
        return 1;
    }
}

/**
 * Conclu le jeu Gagné ou Perdu
 *
 * @param boolean $resultat
 * @return void
 */
function conclusion($resultat){
    if($resultat == 1){
        echo "Gagné\n";
    }else{
        echo "Perdu\n";
    }
}