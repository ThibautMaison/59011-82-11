<?php
$Tutu = readline("Entrez une valeur pour tutu");
$Toto = readline("Entrez une valeur pour toto");
$Tata = readline("Entrez une valeur pour tata");

if (($Toto + 4) > $tutu && $Tata !="OK") {
    $Tutu = $Tutu - 1;
} else {
    $Tutu = $Tutu + 1;
}
