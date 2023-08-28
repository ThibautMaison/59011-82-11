<?php
$age = readline("Quel est l'âge de l'habitant ? ");
$sexe = readline("Quel est le sexe de l'habitant (Homme/Femme) ? ");
$message = '';

if ($sexe == 'Homme' && $age > 20) {
     $message =  "L'habitant est imposable";
} elseif ($sexe == 'Femme' && $age >= 18 && $age <= 35) {
     $message =  "L'habitant est imposable";
} else {
     $message =  "L'habitant n'est pas imposable";
}
echo $message;