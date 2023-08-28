<?php
$nombre = readline("Entre un nombre :");
function factoriel($nombre) {
    if ($nombre <= 1) 
     return 1; 
     return ($nombre * factoriel($nombre - 1)); 
   }
echo "le factoriel de ".$nombre." est: ".factoriel($nombre);



$mot = readline("Entre un mot :");
function splitstr($mot) {
  $arr1 = str_split($mot);
  foreach ($arr1 as $value) {
    echo $value ."\n";
  }
  return $arr1;
}
splitstr($mot);