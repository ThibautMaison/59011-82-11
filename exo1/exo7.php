<?php
function Addition() {

    $flag1     = 1;
    $nbarticle = 0;
    $total     = 0;

    do {
        $prix = readline(">");
        if (preg_match('/^[0-9]+$/', $prix)) {
            if ($prix > 0){
                $nbarticle++;
                $total += $prix;
            } else $flag1--;
        } else print "Entrée une valeur entière";
    } while ($flag1);

    echo "\nIl y a $nbarticle article(s) pour un total de $total Euro(s) \n";
    return "$total";
}

function Rendu($note){
    
    $flag2   = 1;

    do {
        $monnaie = readline("monnaie donnée(int) : > ");
        if (preg_match('/^[0-9]+$/', $monnaie >= $note)) {
            $change = $monnaie - $note;
            echo "\n";
            $flag2--;
        } else print "Montant pas assez suffisant\n";
    } while ($flag2);

    while ($change > 9) {
        echo "10 Euros\n";
        $change -= 10;
    }
    if ($change > 4) {
        echo "5 Euros\n";
        $change -= 5;
    }
    while ($change > 0) {
        echo "1 Euro\n";
        $change -= 1;
    }
    echo "\n";
}

$note = Addition();
Rendu($note); 
?>
