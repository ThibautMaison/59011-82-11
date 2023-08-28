<?php
$nombre = readline("Entre un nombre :");
function fact($nombre) {
    if ($nombre <= 1) 
     return 1; 
     return ($nombre * fact($nombre - 1)); 
   }
echo "le factoriel de ".$nombre." est: ".fact($nombre);
?>