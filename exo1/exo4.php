<?php
// $scores = [];
// for ($i = 1; $i <= 4; $i++) {
//     echo "Score du candidat $i : ";
//     $scores[] = floatval(trim(fgets(STDIN)));
// }
// $totalVotes = array_sum($scores);

// if ($scores[0] > 0.5 * $totalVotes) {
//     echo "Candidat 1 élu au premier tour.\n";
// } elseif ($scores[0] >= max($scores) && $scores[0] >=  0.125 * $totalVotes) {
//     echo "Candidat 1 en ballottage favorable.\n";
// } else {
//     echo "Candidat 1 en ballottage défavorable.\n";
// }




$A = 50;
$B = 0;
$C = 50;
$D = 0;

$C1 = false;
$C2 = false;
$C3 = false;
$C4 = false;


$C1 = $A > 50;
$C2 = $B > 50 || $C > 50 || $D > 50;
$C3 = $A > $B && $A > $C && $A > $D;
$C4 = $A >= 12.5;

if ($C1) {
    echo "Elu au premier tour";
} elseif ($C2 || !$C4) {
    echo "Battu, éliminé, sorti !!!";
} elseif ($C3) {
    echo "Ballotage favorable";
} else{
    echo "Ballotage défavorable";
}