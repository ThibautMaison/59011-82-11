<?php 
// $age = readline("veuillez entrez votre age !\n");
// if($age > 5 ){
//     echo "poussin";
// }elseif($age > 7){
//     echo "Pupille";
// }elseif($age > 9){
//     echo "Minine";
// }else{
//     echo "Cadet";
// }
$age = readline("ton age : ");
$message = '';

if($age > 11){
    $message = 'Cadet';
}elseif($age > 9){
    $message = 'Minime';
}elseif($age > 7){
    $message = 'Pupille';
}elseif($age > 5){
    $message = 'Poussin';
}else{
    $message = 'trop jeune';
}
echo $message;
