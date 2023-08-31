<?php

// Fonction pour générer une combinaison secrète aléatoire
function generateSecretCode($alphabet, $codeLength) {
    $secretCode = [];
    for ($i = 0; $i < $codeLength; $i++) {
        $randIndex = array_rand($alphabet);
        $secretCode[] = $alphabet[$randIndex];
    }
    return $secretCode;
}

// Fonction pour vérifier une proposition et générer des indications
function checkGuess($secretCode, $guess) {
    $indications = [];
    
    for ($i = 0; $i < count($secretCode); $i++) {
        if ($guess[$i] === $secretCode[$i]) {
            $indications[] = 'black';
        } elseif (in_array($guess[$i], $secretCode)) {
            $indications[] = 'white';
        }
    }
    
    shuffle($indications);
    return $indications;
}

// Alphabet et longueur du code secret
$alphabet = range('A', 'Z');
$codeLength = 5;

// Génération de la combinaison secrète
$secretCode = generateSecretCode($alphabet, $codeLength);

echo "Bienvenue dans le jeu Mastermind!\n";
echo "Les lettres possibles sont : " . implode(', ', $alphabet) . "\n";
echo "Essayez de deviner la combinaison secrète en entrant " . $codeLength . " lettres.\n";

// Boucle principale du jeu
while (true) {
    echo "\nEntrez une proposition : ";
    $guess = str_split(strtoupper(trim(fgets(STDIN))));
    
    if (count($guess) !== $codeLength) {
        echo "Veuillez entrer une proposition de $codeLength lettres.\n";
        continue;
    }
    
    $indications = checkGuess($secretCode, $guess);
    
    if (count(array_filter($indications, function($ind) { return $ind === 'black'; })) === $codeLength) {
        echo "Félicitations ! Vous avez deviné la combinaison secrète.\n";
        break;
    }
    
    echo "Indications : " . implode(', ', $indications) . "\n";
}

?>
